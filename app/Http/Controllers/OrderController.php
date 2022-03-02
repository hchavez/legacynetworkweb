<?php

namespace App\Http\Controllers;

use App\Models\Merchandise;
use App\Models\MerchandiseOrder;
use App\Models\MerchandiseOrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;
use App\Http\Traits\UpdatesPayments;
use App\Repositories\NotificationMessagesRepository;
use App\Services\UsersServices;
use Illuminate\Support\Facades\Session;
use DB; 

use App\Http\Clients\AuthorizeNet\Client;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use net\authorize\api\contract\v1\ANetApiResponseType;
use net\authorize\api\contract\v1\ARBCreateSubscriptionResponse;




class OrderController extends Controller
{


    /**
     * @var UsersServices
     */
    private $usersServices;
    /**
     * @var Client
     */
    private $authorizeClient;
    /**
     * @var ActivationPacksServices
     */


    /**
     * Create a new controller instance.
     *
     * @param UsersServices $usersServices
     * @param Client $authorizeClient
     * @param ActivationPacksServices $activationPacksServices
     * @param LnFeesServices $lnFeesServices
     * @param AutoShipsServices $autoShipsServices
     * @param ProductsServices $productsServices
     */
    public function __construct(
        UsersServices $usersServices,
        Client $authorizeClient
    )
    {
//        $this->middleware('guest');
        $this->usersServices = $usersServices;
        $this->authorizeClient = $authorizeClient;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Add to cart
     *
     * @return \Illuminate\Http\Response
     */
    public function addToCart(Request $request){
    
        if($request->product_id){
                $data = Merchandise::where('id', $request->product_id)->first();

                 Session::flash('success', ''); 

                if($request->quantity < $data->stock){

                     $cart = DB::table('merchandise_orders')
                    ->leftJoin('merchandise_order_details', 'merchandise_orders.id', '=', 'merchandise_order_details.order_id')
                    ->where('merchandise_orders.user_id',$request->user_id)
                    ->where('merchandise_order_details.product_id',$request->product_id)
                    ->where('merchandise_orders.status', 'pending')
                    ->orderBy('merchandise_orders.created_at', 'desc')
                    ->limit(1)
                    ->first();

                    if(count($cart) > 0){
                        

                                    $merchsOrd = MerchandiseOrderDetail::where('product_id', $cart->product_id)->where('status', 'pending')->first();

                                    $merchsOrd->quantity = $request->quantity;

                                    $merchsOrd->refresh();

                                     Session::flash('success', 'Product Cart Updated Successfully!'); 

                    }else{


                            if($request->order_id){
                                
                                    $merchs_detail = new MerchandiseOrderDetail;
                                    $merchs_detail->order_id = $request->order_id;
                                    $merchs_detail->product_id = $request->product_id;
                                    $merchs_detail->quantity = $request->quantity;
                                    $merchs_detail->price = $request->price;
                                    $merchs_detail->status = 'pending';

                                    $merchs_detail->save();

                            }else{

                                    $merchs = new MerchandiseOrder;
         
                                    $merchs->user_id = $request->user_id;
                                    $merchs->status = 'pending';

                                    $merchs->save();

                                    $merchs_detail = new MerchandiseOrderDetail;
                                    $merchs_detail->order_id = $merchs->id;
                                    $merchs_detail->product_id = $request->product_id;
                                    $merchs_detail->quantity = $request->quantity;
                                    $merchs_detail->price = $request->price;
                                    $merchs_detail->status = 'pending';

                                    $merchs_detail->save();
                            }

                                    Session::flash('success', 'Product Added Successfully!'); 
                    }


                }else{
                    return redirect()->back()->withError('Item Out of Stock.');
                }

            

        }

            $updated_cart = DB::table('merchandise_orders')
            ->leftJoin('merchandise_order_details', 'merchandise_orders.id', '=', 'merchandise_order_details.order_id')
            ->leftJoin('merchandise', 'merchandise_order_details.product_id', '=', 'merchandise.id')
            ->where('merchandise_orders.user_id',$request->user_id)
            ->where('merchandise_orders.status', 'pending')
            ->orderBy('merchandise_orders.created_at', 'desc')
            ->get();

           $count_item = count($updated_cart);
 

        return view('distributor.business_building.cart', ['updated_cart'=>$updated_cart,'count_item'=>$count_item]);
    }


    public function deleteItem($id){
        if($id){
            $delete_item=MerchandiseOrderDetail::where('product_id', $id)->where('status', 'pending')->first();

            $delete_item->delete();
            
        }
  
        return response()->json([
            'success' => 'Product deleted successfully!'
        ]);

    }


    public function updateQuantity($id,$quantity){
        Session::forget('discount_amount_price');
        Session::forget('coupon_code');
        $sku_size=DB::table('cart')->select('product_code','size','quantity')->where('id',$id)->first();
        $stockAvailable=DB::table('product_att')->select('stock')->where(['sku'=>$sku_size->product_code,
            'size'=>$sku_size->size])->first();
        $updated_quantity=$sku_size->quantity+$quantity;
        if($stockAvailable->stock>=$updated_quantity){
            DB::table('cart')->where('id',$id)->increment('quantity',$quantity);
            return back()->with('message','Update Quantity already');
        }else{
            return back()->with('message','Stock is not Available!');
        }

    }


    public function checkout(Request $request){

         $updated_cart = DB::table('merchandise_orders')
            ->leftJoin('merchandise_order_details', 'merchandise_orders.id', '=', 'merchandise_order_details.order_id')
            ->leftJoin('merchandise', 'merchandise_order_details.product_id', '=', 'merchandise.id')
            ->where('merchandise_orders.user_id',$request->user_id)
            ->where('merchandise_orders.status', 'pending')
            ->orderBy('merchandise_orders.created_at', 'desc')
            ->get();

           $count_item = count($updated_cart);
 


        return view('distributor.business_building.checkout', ['updated_cart'=>$updated_cart,'count_item'=>$count_item]);
    }


    public function confirm_payment(Request $request){

        $allInputs = []; 

        $allInputs['amount'] = $request->amount;
        $allInputs['cc_number'] = $request->cc_number;
        $allInputs['cc_cvv'] = $request->cc_cvv;
        $allInputs['year_expire'] = $request->year_expire;
        $allInputs['month_expire'] = $request->month_expire;

        $response = $this->authorizeClient->processSinglePayment($allInputs);
        $check=false;

        if ($response['status'] === 'successful') {

            $updateMerchorder = MerchandiseOrder::where('id', $request->order_id)->where('user_id',  $request->user_id)->where('status', 'pending')->first();

            $updateMerchorder->status = 'ongoing';

            $updateMerchorder->transaction_id = $response['transactionId'];

            $updateMerchorder->total = $request->amount;

            $updateMerchorder->save();

           
            $get_cart = DB::table('merchandise_order_details')
                    ->leftJoin('merchandise_orders', 'merchandise_order_details.order_id', '=', 'merchandise_orders.id')
                    ->where('merchandise_order_details.order_id', $request->order_id)
                    ->where('merchandise_order_details.status', 'pending')
                    ->orderBy('merchandise_order_details.created_at', 'desc')
                    ->get(); 

            if($get_cart){
               
                foreach ($get_cart as $key => $value) {
                
                    $updateMerchorderdetail = MerchandiseOrderDetail::where('product_id', $value->product_id)->where('status', 'pending')->first();

                    $updateMerchorderdetail->status = 'ongoing';

                    $updateMerchorderdetail->save();

                }

                
            }

            
    
         $check = true;

        }

        if($check == true){
           
            Session::flash('success', 'Thank you! Your Order is Successfully Created!'); 

            return view('distributor.business_building.confirmation');
        }

        if ($response['status'] === 'failed') {

            return redirect()->back()->withErrors(['cc_failure' => $response['error']]);

        }

        
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
