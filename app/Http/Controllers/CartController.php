<?php

namespace App\Http\Controllers;

use App\Models\Merchandise;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;
use App\Http\Traits\UpdatesPayments;
use App\Repositories\NotificationMessagesRepository;
use App\Services\UsersServices;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function productList()
    {
         $products = [];
         $products = Merchandise::where('status','active')->get();

         return view('distributor.business_building.merchandise_list', ['products'=>$products]); 
    }

    public function addToCart(Request $request){
        $inputToCart=$request->all();
        //Session::forget('discount_amount_price');
       //Session::forget('coupon_code');

            $stockAvailable=Merchandise::select('stock','sku')->where(['id'=>$inputToCart['products_id'],
                'price'=>$inputToCart['price']])->first();
            if($stockAvailable->stock>=$inputToCart['quantity']){
                $inputToCart['user_email']='';
                $session_id=Session::get('session_id');
                if(empty($session_id)){
                    $session_id=str_random(40);
                    Session::put('session_id',$session_id);
                }
                $inputToCart['session_id']=$session_id;
                //$sizeAtrr=$inputToCart['size'];
                //$inputToCart['size']=$sizeAtrr[1];
                $inputToCart['sku']=$stockAvailable->sku;
                $count_duplicateItems=Cart_model::where(['products_id'=>$inputToCart['products_id'],
                    'color'=>$inputToCart['color'],
                    'size'=>$inputToCart['size']])->count();
                if($count_duplicateItems>0){
                    return back()->with('message','This Item Added already');
                }else{
                    Cart_model::create($inputToCart);
                    return back()->with('message','Add To Cart Already');
                }
            }else{
                return back()->with('message','Stock is not Available!');
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
     * @param  \App\Merchandise  $merchandise
     * @return \Illuminate\Http\Response
     */
    public function show(Merchandise $merchandise)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Merchandise  $merchandise
     * @return \Illuminate\Http\Response
     */
    public function edit(Merchandise $merchandise)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Merchandise  $merchandise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Merchandise $merchandise)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Merchandise  $merchandise
     * @return \Illuminate\Http\Response
     */
    public function destroy(Merchandise $merchandise)
    {
        //
    }
}
