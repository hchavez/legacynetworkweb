<?php

namespace App\Http\Controllers;

use App\Http\Requests\CalendarPublicEventRequest;
use App\Services\ActivationPacksServices;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AdminActivationPacksController extends Controller
{
    /**
     * @var ActivationPacksServices
     */
    private $services;

    /**
     * @param ActivationPacksServices $services
     */
    public function __construct(ActivationPacksServices $services)
    {
        $this->services = $services;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('legacy_admin.activation_packs');
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

        return view('legacy_admin.activation_packs_form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->services->create($request->except(['_method']));
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
        $details = $this->services->find($id);
        $data = [];
        $data['_method'] = 'PUT';
        $data['id'] = $details->id;
        $data['name'] = $details->name;
        $data['price'] = $details->price;
        $data['description'] = $details->description;
        $data['image'] = $details->image;

        return view('legacy_admin.activation_packs_form', $data);
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
        $data = $this->services->update($request->except(['_method']), $id);
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
        $data = $this->services->delete($id);
        return response(['status' => 'ok', 'message' => 'deleted', 'data' => $data]);
    }

    public function update_image(Request $request)
    {
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->save( public_path('/uploads/avatars/' . $filename ) );

            $record = $this->services->find($request->input('id'));
            $record->image = $filename;
            $record->save();
        }

        return redirect()->back();

    }
}
