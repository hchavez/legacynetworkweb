<?php

namespace App\Http\Controllers;

use App\Services\ChallengesServices;
use App\Services\BusinessCardsServices;
use Illuminate\Http\Request;
use Image;

class AdminBusinessCardsController extends Controller
{
    /**
     * @var ProductsServices
     */
    private $businesscardsServices;
    /**
     * @var ChallengesServices
     */
    private $challengesServices;

    /**
     * AdminProductsController constructor.
     * @param ProductsServices $productsServices
     * @param ChallengesServices $challengesServices
     */
    public function __construct(BusinessCardsServices $businesscardsServices, ChallengesServices $challengesServices)
    {
        $this->businesscardsServices = $businesscardsServices;
        $this->challengesServices = $challengesServices;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('legacy_admin.business_cards');
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
        $data['name'] =  null;
        $data['title'] =  null;
        $data['website'] =  null;
        $data['email'] =  null;
        $data['phone'] =  null;
        $data['status'] =  null;

        return view('legacy_admin.business_cards_form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->businesscardsServices->create($request->except(['_method']));
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
        $bc = $this->businesscardsServices->find($id);
        $data = [];
        $data['_method'] = 'PUT';
        $data['id'] = $bc->id;
        $data['name'] = $bc->name;
        $data['title'] = $bc->title;
        $data['website'] = $bc->website;
        $data['email'] = $bc->email;
        $data['phone'] = $bc->phone;
        $data['status'] = $bc->status;


        return view('legacy_admin.business_cards_form', $data);
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
        $data = $this->businesscardsServices->update($request->except(['_method']), $id);
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
        $data = $this->businesscardsServices->delete($id);
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
