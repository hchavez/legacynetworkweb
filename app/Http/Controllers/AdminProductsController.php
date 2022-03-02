<?php

namespace App\Http\Controllers;

use App\Services\ChallengesServices;
use App\Services\ProductsServices;
use Illuminate\Http\Request;
use Image;

class AdminProductsController extends Controller
{
    /**
     * @var ProductsServices
     */
    private $productsServices;
    /**
     * @var ChallengesServices
     */
    private $challengesServices;

    /**
     * AdminProductsController constructor.
     * @param ProductsServices $productsServices
     * @param ChallengesServices $challengesServices
     */
    public function __construct(ProductsServices $productsServices, ChallengesServices $challengesServices)
    {
        $this->productsServices = $productsServices;
        $this->challengesServices = $challengesServices;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('legacy_admin.products');
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
        $data['challenges'] = $this->challengesServices->all();
        $data['name'] = null;
        $data['price'] = null;
        $data['description'] = null;
        $data['sku'] = null;
        $data['challenge_id'] = null;
        $data['image'] = null;

        return view('legacy_admin.products_form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->productsServices->create($request->except(['_method']));
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
        $products = $this->productsServices->find($id);
        $data = [];
        $data['_method'] = 'PUT';
        $data['id'] = $products->id;
        $data['name'] = $products->name;
        $data['price'] = $products->price;
        $data['description'] = $products->description;
        $data['sku'] = $products->sku;
        $data['challenge_id'] = $products->challenge_id;
        $data['image'] = $products->image;

        $data['challenges'] = $this->challengesServices->all();

        return view('legacy_admin.products_form', $data);
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
        $data = $this->productsServices->update($request->except(['_method']), $id);
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
        $data = $this->productsServices->delete($id);
        return response(['status' => 'ok', 'message' => 'deleted', 'data' => $data]);
    }

    public function update_image(Request $request)
    {
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->save( public_path('/uploads/avatars/' . $filename ) );

            $product = $this->productsServices->find($request->input('product_id'));
            $product->image = $filename;
            $product->save();
        }

        return redirect()->back();

    }
}
