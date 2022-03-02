<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminEnrollmentRequest;
use App\Http\Requests\UserRequest;
use App\Services\SupportTicketsServices;
use Illuminate\Http\Request;

class AdminTicketsController extends Controller
{
    /**
     * @var SupportTicketsServices
     */
    private $supportTicketsServices;

    public function __construct(SupportTicketsServices $supportTicketsServices)
    {
        $this->supportTicketsServices = $supportTicketsServices;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('legacy_admin.legacy_support_tickets');
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
        return response(['status' => 'ok', 'message' => 'no need to create data here']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticket = $this->supportTicketsServices->find($id);

        $data['ticket'] = $ticket;
        $data['comments'] = $ticket->comments;

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
        $distributor = $this->supportTicketsServices->find($id);
        $distributor->_method = 'PUT';

        $data['data'] = $distributor;

        return view('legacy_admin.synergy_enrollment_form', $data);
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
        $data = $this->supportTicketsServices->update($request->except(['_method']), $id);
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
        $data = $this->supportTicketsServices->delete($id);
        return response(['status' => 'ok', 'message' => 'deleted', 'data' => $data]);
    }
}
