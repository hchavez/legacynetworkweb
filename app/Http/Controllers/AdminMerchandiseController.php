<?php

namespace App\Http\Controllers;

use App\Services\ChallengesServices;
use App\Services\MerchandiseServices;
use Illuminate\Http\Request;
use Image;

class AdminMerchandiseController extends Controller
{
    /**
     * @var ProductsServices
     */
    private $merchandiseServices;
    /**
     * @var ChallengesServices
     */
    private $challengesServices;

    /**
     * AdminProductsController constructor.
     * @param ProductsServices $productsServices
     * @param ChallengesServices $challengesServices
     */
    public function __construct(MerchandiseServices $merchandiseServices, ChallengesServices $challengesServices)
    {
        $this->merchandiseServices = $merchandiseServices;
        $this->challengesServices = $challengesServices;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('legacy_admin.merchandise');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        $data['_method'] = 'POST';
        $data['id'] = null;
        $data['product_name'] = null;
        $data['product_description'] = null;
        $data['size'] = null;
        $data['color'] = null;
        $data['price'] = null;
        $data['stock'] = null;
        $data['image'] = null;
        $data['status'] = null;

        return view('legacy_admin.merchandise_form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->merchandiseServices->create($request->except(['_method']));
        return response(['status' => 'ok', 'message' => 'created', 'data' => $data]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bc = $this->merchandiseServices->find($id);
        $data = [];
        $data['_method'] = 'PUT';
        $data['id'] = $bc->id;
        $data['product_name'] = $bc->product_name;
        $data['product_description'] = $bc->product_description;
        $data['size'] = $bc->size;
        $data['color'] = $bc->color;
        $data['price'] = $bc->price;
        $data['stock'] = $bc->stock;
        $data['image'] = $bc->image;
        $data['status'] = $bc->status;


        return view('legacy_admin.merchandise_form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $this->merchandiseServices->update($request->except(['_method']), $id);
        return response(['status' => 'ok', 'message' => 'updated', 'data' => $data]);
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->merchandiseServices->delete($id);
        return response(['status' => 'ok', 'message' => 'deleted', 'data' => $data]);
    }

    public function update_image(Request $request)
    {
        if($request->hasFile('product_img')){
            $avatar = $request->file('product_img');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->save( public_path('/uploads/merchandise/' . $filename ) );

            $product = $this->merchandiseServices->find($request->input('product_id'));
            $product->image = $filename;
            $product->save();
        }

        return redirect()->back();

    }
}
