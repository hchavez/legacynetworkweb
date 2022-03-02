<?php

namespace App\Http\Controllers;

use App\Services\MemberInvitesServices;
use App\Services\UsersServices;
use Illuminate\Http\Request;

class PurlController extends Controller
{
    /**
     * @var UsersServices
     */
    private $usersServices;
    /**
     * @var MemberInvitesServices
     */
    private $memberInvitesServices;

    /**
     * @param UsersServices $usersServices
     * @param MemberInvitesServices $memberInvitesServices
     */
    public function __construct(UsersServices $usersServices, MemberInvitesServices $memberInvitesServices)
    {
        $this->usersServices = $usersServices;
        $this->memberInvitesServices = $memberInvitesServices;
    }

    public function setPurlSession(Request $request, $purl)
    {
        $this->usersServices->setPurlSession($purl);

        if ($request->has('token')) {
            $token = $request->input('token');

            $this->memberInvitesServices->updateByToken([
                'is_visited' => 1
            ], $token);
        }

        return redirect('/');
    }

    public function clearPurlSession()
    {
        session()->forget('purl_user');
        return redirect('/');
    }
}
