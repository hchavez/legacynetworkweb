<?php

namespace App\Http\Controllers\Api;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class AuthController extends Controller
{
    use SendsPasswordResetEmails;

    public function forgot(Request $request)
    {
        return $this->sendResetLinkEmail($request);
    }

    protected function sendResetLinkResponse($response)
    {
        return response([
            'status' => 'ok',
            'message' => 'Password reset link sent'
        ], 200);
    }

    protected function sendResetLinkFailedResponse($response)
    {
        return response([
            'status' => 'failed',
            'message' => 'Email not found'
        ], 400);
    }

    public function sendResetLinkEmail(Request $request)
    {
        $this->validateUsername($request);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $response = $this->broker()->sendResetLink(
            $request->only('email')
        );

        return $response == Password::RESET_LINK_SENT
            ? $this->sendResetLinkResponse($response)
            : $this->sendResetLinkFailedResponse($response);
    }

    protected function validateUsername(Request $request)
    {
        $this->validate($request, ['email' => 'required']);
    }

}
