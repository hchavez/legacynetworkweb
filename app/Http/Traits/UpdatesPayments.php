<?php

namespace App\Http\Traits;

use App\Http\Clients\AuthorizeNet\Client;
use App\Http\Requests\UpdatePaymentInformationRequest;

trait UpdatesPayments
{
    public function processUpdatePaymentInfo(UpdatePaymentInformationRequest $request)
    {
        $user = user();
        $authNetClient = new Client();

        if ($user->auth_net_subscription_id) {
            $oldSubscriptionId = $user->auth_net_subscription_id;

            $updateSubscription = $authNetClient->updateSubscriptionCardInfo(
                $user->auth_net_subscription_id,
                $request->input('cc_number'),
                $request->input('year_expire'),
                $request->input('month_expire'),
                $request->input('cc_cvv')
            );

            if ($updateSubscription['status'] == 'successful') {

                $authNetClient->cancelSubscription($oldSubscriptionId);

                return response([
                    'message' => $updateSubscription['msg']
                ], 200);
            } else {
                return response([
                    'message' => $updateSubscription['msg']
                ], 500);
            }
        } else {
            $updateSubscription = $authNetClient->createSubscriptionCardInfo(
                $user,
                $request->input('cc_number'),
                $request->input('year_expire'),
                $request->input('month_expire'),
                $request->input('cc_cvv')
            );

            if ($updateSubscription['status'] == 'successful') {
                return response([
                    'message' => $updateSubscription['msg']
                ], 200);
            } else {
                return response([
                    'message' => $updateSubscription['msg']
                ], 500);
            }
        }


    }
}