<?php

namespace App\Http\Controllers\Api;

use Auth;
use App\Http\Controllers\Controller;
use App\Services\SiteSettingsServices;
use Illuminate\Http\Request;

class ApiSiteSettingsController extends Controller
{
    /**
     * @var SiteSettingsServices
     */
    private $services;

    public function __construct(SiteSettingsServices $services)
    {
        $this->services = $services;
    }

    public function index()
    {
        $data = $this->services->all();

        return response(['status' => 'ok', 'data' => $data]);
    }


    public function create(Request $request)
    {
        return response();
    }


    public function store(Request $request)
    {
        $data = $this->services->create($request->except('_method'));

        return response(['status' => 'ok', 'message' => 'created', 'data' => $data]);
    }


    public function show($id)
    {
        $data = $this->services->find($id);

        return response(['status' => 'ok', 'data' => $data]);
    }


    public function edit($id)
    {
        return response();
    }


    public function update(Request $request, $id)
    {
        $data = $this->services->update($request->except('_method'), $id);

        return response(['status' => 'ok', 'message' => 'updated', 'data' => $data]);
    }


    public function destroy($id)
    {
        $this->services->delete($id);

        return response(['status' => 'ok', 'message' => 'deleted']);
    }
}
