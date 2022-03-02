<?php

namespace App\Http\Controllers;

use App\Mail\MemberInvite;
use App\Services\MemberInvitesServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Mail;

class MemberInvitesController extends Controller
{
    /**
     * @var MemberInvitesServices
     */
    private $memberInvitesServices;

    /**
     * @param MemberInvitesServices $memberInvitesServices
     */
    public function __construct(MemberInvitesServices $memberInvitesServices)
    {
        $this->memberInvitesServices = $memberInvitesServices;
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
        $data['in_training'] = false;
        $data['invites'] = $this->memberInvitesServices->getInvitesByUser($user);

        if (!$user->is_training_done) {
            $data['in_training'] = true;
        }

        return view('distributor.business_building.member_invites', $data);
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
    public function store(Request $request)
    {
        $data = $request->except('_method');

        $invite_links = [];
        foreach ($data['email'] as $key => $email) {
            if ($email) {
                $user = user();
                $token = Password::getRepository()->createNewToken();
                $this->memberInvitesServices->create([
                    'user_id' => $user->id,
                    'email' => $email,
                    'name' => (isset($data['recipient_name'])) ? $data['recipient_name'][$key] : null,
                    'token' => $token,
                    'body' => $data['body'],
                    'subject' => $data['subject'],
                ]);

                Mail::to($email)->send(new MemberInvite($user, $data['recipient_name'][$key], $token, $data['body'], $data['subject']));

                $invite_links[] = [
                    'recipient_name' => $data['recipient_name'][$key],
                    'link' => url('') . '/' . $user->purl . '?token=' . $token,
                ];
            }
        }

        return response(['status' => 'ok', 'message' => 'invites sent', 'invite_links' => $invite_links]);
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
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->memberInvitesServices->delete($id);

        return response(['message' => 'deleted']);
    }

    public function resend(Request $request)
    {
        $inputs = $request->all();
        $invite = $this->memberInvitesServices->find($inputs['id']);

        $user = user();

        Mail::to($invite->email)->send(new MemberInvite($user, $invite->name, $invite->token, $invite->body, $invite->subject));

        return response(['message' => 'sent']);
    }

}
