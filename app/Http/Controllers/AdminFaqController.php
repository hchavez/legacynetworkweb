<?php

namespace App\Http\Controllers;

use App\Services\FaqCategoriesServices;
use App\Services\FaqServices;
use Illuminate\Http\Request;

class AdminFaqController extends Controller
{
    /**
     * @var FaqCategoriesServices
     */
    private $faqServices;
    /**
     * @var FaqCategoriesServices
     */
    private $faqCategoriesServices;

    /**
     * AdminFaqController constructor.
     * @param FaqServices $faqServices
     * @param FaqCategoriesServices $faqCategoriesServices
     */
    public function __construct(FaqServices $faqServices, FaqCategoriesServices $faqCategoriesServices)
    {
        $this->faqServices = $faqServices;
        $this->faqCategoriesServices = $faqCategoriesServices;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('legacy_admin.faq');
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
        $data['question'] = null;
        $data['short_answer'] = null;
        $data['long_answer'] = null;
        $data['category_id'] = null;
        $data['categories'] = $this->faqCategoriesServices->all();

        return view('legacy_admin.faq_form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->faqServices->create($request->except(['_method']));
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
        $faq = $this->faqServices->find($id);
        $data = [];
        $data['_method'] = 'PUT';
        $data['id'] = $faq->id;
        $data['question'] = $faq->question;
        $data['short_answer'] = $faq->short_answer;
        $data['long_answer'] = $faq->long_answer;
        $data['category_id'] = $faq->category_id;
        $data['categories'] = $this->faqCategoriesServices->all();

        return view('legacy_admin.faq_form', $data);
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
        $data = $this->faqServices->update($request->except(['_method']), $id);
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
        $data = $this->faqServices->delete($id);
        return response(['status' => 'ok', 'message' => 'deleted', 'data' => $data]);
    }
}
