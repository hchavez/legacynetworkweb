<?php

namespace App\Http\Controllers;

use App\Services\FaqCategoriesServices;
use Illuminate\Http\Request;

class AdminFaqCategoriesController extends Controller
{
    /**
     * @var FaqCategoriesServices
     */
    private $faqCategoriesServices;

    public function __construct(FaqCategoriesServices $faqCategoriesServices)
    {
        $this->faqCategoriesServices = $faqCategoriesServices;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('legacy_admin.faq_categories');
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
        $data['name'] = null;

        return view('legacy_admin.faq_categories_form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->faqCategoriesServices->create($request->except(['_method']));
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
        $faqCategory = $this->faqCategoriesServices->find($id);
        $data = [];
        $data['_method'] = 'PUT';
        $data['id'] = $faqCategory->id;
        $data['name'] = $faqCategory->name;

        return view('legacy_admin.faq_categories_form', $data);
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
        $data = $this->faqCategoriesServices->update($request->except(['_method']), $id);
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
        $data = $this->faqCategoriesServices->delete($id);
        return response(['status' => 'ok', 'message' => 'deleted', 'data' => $data]);
    }
}
