<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupportTicketRequest;
use App\Services\SupportTicketCategoriesServices;
use App\Services\SupportTicketCommentsServices;
use App\Services\SupportTicketsServices;
use Illuminate\Http\Request;

class SupportTicketController extends Controller
{

    /**
     * @var SupportTicketsServices
     */
    private $supportTicketsServices;
    /**
     * @var SupportTicketCategoriesServices
     */
    private $categoriesServices;
    /**
     * @var SupportTicketCommentsServices
     */
    private $supportTicketCommentsServices;

    /**
     * @param SupportTicketsServices $supportTicketsServices
     * @param SupportTicketCategoriesServices $categoriesServices
     * @param SupportTicketCommentsServices $supportTicketCommentsServices
     */
    public function __construct(
        SupportTicketsServices $supportTicketsServices,
        SupportTicketCategoriesServices $categoriesServices,
        SupportTicketCommentsServices $supportTicketCommentsServices
    )
    {
        $this->supportTicketsServices = $supportTicketsServices;
        $this->categoriesServices = $categoriesServices;
        $this->supportTicketCommentsServices = $supportTicketCommentsServices;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = user();
        $data['user'] = $user;
        $data['user_tickets'] = $this->supportTicketsServices->getAllUserTickets();
        $data['in_training'] = false;

        if (!$user->is_training_done) {
            $data['in_training'] = true;
        }

        return view('distributor.support.my_tickets', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = user();
        $data['user'] = $user;
        $data['categories'] = $this->categoriesServices->all();
        $data['user_tickets'] = $this->supportTicketsServices->getAllUserTickets();
        $data['in_training'] = false;

        if (!$user->is_training_done) {
            $data['in_training'] = true;
        }

        return view('distributor.support.open_ticket', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(SupportTicketRequest $request)
    {
        $data = $request->except('_method');
        $data = $this->supportTicketsServices->create($data);

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
        $user = user();
        $data['user'] = $user;
        $data['ticket'] = $this->supportTicketsServices->find($id);
        $data['ticket_comments'] = $this->supportTicketCommentsServices->getAllCommentsByTicketId($id);
        $data['in_training'] = false;

        if (!$user->is_training_done) {
            $data['in_training'] = true;
        }

        return view('distributor.support.ticket', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(SupportTicketRequest $request, $id)
    {
        $data = $this->supportTicketsServices->update($data = $request->except('_method'), $id);
        return response(['status' => 'ok', 'message' => 'created', 'data' => $data]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
