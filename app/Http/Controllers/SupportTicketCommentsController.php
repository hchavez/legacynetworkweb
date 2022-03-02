<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupportTicketRequest;
use App\Mail\TicketResponse;
use App\Repositories\SupportTicketsRepository;
use App\Repositories\UsersRepository;
use App\Services\SupportTicketCommentsServices;
use Mail;

class SupportTicketCommentsController extends Controller
{
    /**
     * @var SupportTicketCommentsServices
     */
    private $supportTicketCommentsServices;
    /**
     * @var SupportTicketsRepository
     */
    private $supportTicketsRepository;
    /**
     * @var UsersRepository
     */
    private $usersRepository;

    /**
     * SupportTicketCommentsController constructor.
     * @param SupportTicketCommentsServices $supportTicketCommentsServices
     * @param SupportTicketsRepository $supportTicketsRepository
     * @param UsersRepository $usersRepository
     */
    public function __construct(
        SupportTicketCommentsServices $supportTicketCommentsServices,
        SupportTicketsRepository $supportTicketsRepository,
        UsersRepository $usersRepository
    )
    {
        $this->supportTicketCommentsServices = $supportTicketCommentsServices;
        $this->supportTicketsRepository = $supportTicketsRepository;
        $this->usersRepository = $usersRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
        $data['user_id'] = user()->id;


        $support_ticket = $this->supportTicketsRepository->find($data['support_ticket_id']);
        $ticket_user = $this->usersRepository->find($support_ticket->user_id);

        $data = $this->supportTicketCommentsServices->create($data);
        Mail::to($ticket_user->email)->send(new TicketResponse($ticket_user, $support_ticket, $data['comment']));

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
        $data = $this->supportTicketCommentsServices->update($data = $request->except('_method'), $id);
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
