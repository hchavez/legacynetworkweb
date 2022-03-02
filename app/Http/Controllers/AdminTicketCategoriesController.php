<?php

namespace App\Http\Controllers;

use App\Services\SupportTicketCategoriesServices;
use Illuminate\Http\Request;

class AdminTicketCategoriesController extends Controller
{
    /**
     * @var SupportTicketCategoriesServices
     */
    private $supportTicketCategoriesServices;

    public function __construct(SupportTicketCategoriesServices $supportTicketCategoriesServices)
    {
        $this->supportTicketCategoriesServices = $supportTicketCategoriesServices;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('legacy_admin.legacy_support_ticket_categories');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect('/');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->supportTicketCategoriesServices->create($request->except('_method'));
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
        $ticketCategory = $this->supportTicketCategoriesServices->find($id);

        $data['ticketCategory'] = $ticketCategory;

        return view('legacy_admin.legacy_support_ticket_details', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return response(['status' => 'ok', 'message' => 'no need to edit data here']);
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
        $data = $this->supportTicketCategoriesServices->update($request->except(['_method']), $id);
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
        $data = $this->supportTicketCategoriesServices->delete($id);
        return response(['status' => 'ok', 'message' => 'deleted', 'data' => $data]);
    }
}
