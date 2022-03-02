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
use DB;
use PDF;

class MerchandiseController extends Controller
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

        $updated_cart = DB::table('merchandise_orders')
            ->leftJoin('merchandise_order_details', 'merchandise_orders.id', '=', 'merchandise_order_details.order_id')
            ->leftJoin('merchandise', 'merchandise_order_details.product_id', '=', 'merchandise.id')
            ->where('merchandise_orders.user_id',Auth::user()->id)
            ->where('merchandise_orders.status', 'pending')
            ->orderBy('merchandise_orders.created_at', 'desc')
            ->get();

           $count_item = count($updated_cart);

         return view('distributor.business_building.merchandise_list', ['products'=>$products,'count_item'=>$count_item]); 
    }

    public function product($id){
        $product=Merchandise::where('status','active')->findOrFail($id);

           $updated_cart = DB::table('merchandise_orders')
            ->select('merchandise_orders.*','merchandise.*','merchandise_orders.id as order_id')
            ->leftJoin('merchandise_order_details', 'merchandise_orders.id', '=', 'merchandise_order_details.order_id')
            ->leftJoin('merchandise', 'merchandise_order_details.product_id', '=', 'merchandise.id')
            ->where('merchandise_orders.user_id',Auth::user()->id)
            ->where('merchandise_orders.status', 'pending')
            ->orderBy('merchandise_orders.created_at', 'desc')
            ->first();

            $countpending = DB::table('merchandise_orders')
            ->select('merchandise_orders.*','merchandise.*','merchandise_orders.id as order_id')
            ->leftJoin('merchandise_order_details', 'merchandise_orders.id', '=', 'merchandise_order_details.order_id')
            ->leftJoin('merchandise', 'merchandise_order_details.product_id', '=', 'merchandise.id')
            ->where('merchandise_orders.user_id',Auth::user()->id)
            ->where('merchandise_orders.status', 'pending')
            ->orderBy('merchandise_orders.created_at', 'desc')
            ->get();


           $count_item = count($countpending);

              if($count_item){$updated_cart=$updated_cart;}else{$updated_cart=null;}
        
        return view('distributor.business_building.merchandise', ['detail_product'=>$product,'count_item'=>$count_item,'cart'=>$updated_cart]); 
    }

    public function printpdf(){
             // This  $data array will be passed to our PDF blade
       $data = [
          'title' => 'First PDF for Medium',
          'heading' => 'Hello from 99Points.info',
          'content' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged."
            ];
        
        $pdf = PDF::loadView('public_pages_v2.print_pdf', $data);  
        return $pdf->download('medium.pdf');

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
