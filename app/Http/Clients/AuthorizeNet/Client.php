<?php

namespace App\Http\Clients\AuthorizeNet;

use App\Models\LnFees;
use App\User;
use Carbon\Carbon;
use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;

class Client
{
    public static function ANetEnvironment()
    {
        if (env('APP_ENV') == 'production') {
            return \net\authorize\api\constants\ANetEnvironment::PRODUCTION;
        }

        return \net\authorize\api\constants\ANetEnvironment::SANDBOX;
    }

    /**
     * @param array $paymentDetails
     * @return array
     *  email
     *  first_name
     *  last_name
     *  date_of_birth
     *  mobile
     *  mailing_country
     *  mailing_address_1
     *  mailing_address_2
     *  mailing_city
     *  mailing_state
     *  mailing_postal_code
     *  physical_country
     *  physical_address_1
     *  physical_address_2
     *  physical_city
     *  physical_state
     *  physical_postal_code
     *  activation_pack_id
     *  auto_ship_id
     *  ln_fee_id
     *  cc_name
     *  month_expire
     *  year_expire
     *  cc_number
     *  cc_cvv
     *  initial_payment_amount
     *  subscription_amount
     */
    public function processPayment(array $paymentDetails, $chargeInitialAmount = false)
    {
        // Common setup for API credentials
        $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
        $merchantAuthentication->setName(config('services.authorize.login'));
        $merchantAuthentication->setTransactionKey(config('services.authorize.key'));
        $refId = 'ref' . time();
        // Create the payment data for a credit card
        $creditCard = new AnetAPI\CreditCardType();
        $creditCard->setCardNumber($paymentDetails['cc_number']);
        $creditCard->setCardCode($paymentDetails['cc_cvv']);


        $expiry = $paymentDetails['year_expire'] . '-' . $paymentDetails['month_expire'];
        $creditCard->setExpirationDate($expiry);
        $paymentOne = new AnetAPI\PaymentType();
        $paymentOne->setCreditCard($creditCard);

        // Set the customer's Bill To address
        $billTo = new AnetAPI\CustomerAddressType();
        $billTo->setFirstName($paymentDetails['first_name']);
        $billTo->setLastName($paymentDetails['last_name']);
        $billTo->setAddress(trim($paymentDetails['mailing_address_1'] . " " . $paymentDetails['mailing_address_2']));
        $billTo->setCity($paymentDetails['mailing_city']);
        $billTo->setState($paymentDetails['mailing_state']);
        $billTo->setZip($paymentDetails['mailing_postal_code']);
        $billTo->setCountry($paymentDetails['mailing_country']);

        // Set the customer's Ship To address
        $shipTo = new AnetAPI\NameAndAddressType();
        $shipTo->setFirstName($paymentDetails['first_name']);
        $shipTo->setLastName($paymentDetails['last_name']);
        $shipTo->setAddress(trim($paymentDetails['physical_address_1'] . " " . $paymentDetails['physical_address_2']));
        $shipTo->setCity($paymentDetails['physical_city']);
        $shipTo->setState($paymentDetails['physical_state']);
        $shipTo->setZip($paymentDetails['physical_postal_code']);
        $shipTo->setCountry($paymentDetails['physical_country']);

        /* we don't need to charge them initial amount, just the LN fee subscription */
        if ($chargeInitialAmount) {
            $transactionRequestType = new AnetAPI\TransactionRequestType();
            $transactionRequestType->setTransactionType("authCaptureTransaction");
            $transactionRequestType->setAmount($paymentDetails['initial_payment_amount']);
            $transactionRequestType->setPayment($paymentOne);
            $transactionRequestType->setBillTo($billTo);
            $transactionRequestType->setShipTo($shipTo);
            $request = new AnetAPI\CreateTransactionRequest();
            $request->setMerchantAuthentication($merchantAuthentication);
            $request->setRefId($refId);
            $request->setTransactionRequest($transactionRequestType);
            $controller = new AnetController\CreateTransactionController($request);
            $controller->executeWithApiResponse(self::ANetEnvironment());
        }

        ###########################
        ## THE SUBSCRIPTION PART ##
        ###########################

        // Subscription Type Info
        $subscription = new AnetAPI\ARBSubscriptionType();
        $subscription->setName("Legacy Network Subscription");
        $interval = new AnetAPI\PaymentScheduleType\IntervalAType();
        $interval->setLength(1);
        $interval->setUnit("months");
        $paymentSchedule = new AnetAPI\PaymentScheduleType();
        $paymentSchedule->setInterval($interval);
        $paymentSchedule->setStartDate(new \DateTime());
        $paymentSchedule->setTotalOccurrences("9999");
        $subscription->setPaymentSchedule($paymentSchedule);
        $subscription->setAmount($paymentDetails['subscription_amount']);

        $payment = new AnetAPI\PaymentType();
        $payment->setCreditCard($creditCard);

        $subscription->setPayment($payment);
        $subscription->setBillTo($billTo);
        $subscription->setShipTo($shipTo);

        $request = new AnetAPI\ARBCreateSubscriptionRequest();
        $request->setmerchantAuthentication($merchantAuthentication);
        $request->setRefId($refId);
        $request->setSubscription($subscription);
        $controller = new AnetController\ARBCreateSubscriptionController($request);
        $response = $controller->executeWithApiResponse(self::ANetEnvironment());

        if (($response != null) && ($response->getMessages()->getResultCode() == "Ok")) {
            return [
                'status' => 'successful',
                'msg' => 'cc_transaction_ok',
                'response' => $response
            ];
        } else {
            $errorMessages = $response->getMessages()->getMessage();
            return [
                'status' => 'failed',
                'msg' => 'cc_transaction_failed',
                'error' => "Credit Card Transaction Failed : " . $errorMessages[0]->getText()
            ];
        }

    }


     public function processPaymentSingle(array $paymentDetails, $chargeInitialAmount = false)
    {
        // Common setup for API credentials
        $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
        $merchantAuthentication->setName(config('services.authorize.login'));
        $merchantAuthentication->setTransactionKey(config('services.authorize.key'));
        $refId = 'ref' . time();
        // Create the payment data for a credit card
        $creditCard = new AnetAPI\CreditCardType();
        $creditCard->setCardNumber($paymentDetails['cc_number']);
        $creditCard->setCardCode($paymentDetails['cc_cvv']);


        $expiry = $paymentDetails['year_expire'] . '-' . $paymentDetails['month_expire'];
        $creditCard->setExpirationDate($expiry);
        $paymentOne = new AnetAPI\PaymentType();
        $paymentOne->setCreditCard($creditCard);

        // Set the customer's Bill To address
        $billTo = new AnetAPI\CustomerAddressType();
        $billTo->setFirstName($paymentDetails['first_name']);
        $billTo->setLastName($paymentDetails['last_name']);
        $billTo->setAddress(trim($paymentDetails['mailing_address_1'] . " " . $paymentDetails['mailing_address_2']));
        $billTo->setCity($paymentDetails['mailing_city']);
        $billTo->setState($paymentDetails['mailing_state']);
        $billTo->setZip($paymentDetails['mailing_postal_code']);
        $billTo->setCountry($paymentDetails['mailing_country']);

        // Set the customer's Ship To address
        $shipTo = new AnetAPI\NameAndAddressType();
        $shipTo->setFirstName($paymentDetails['first_name']);
        $shipTo->setLastName($paymentDetails['last_name']);
        $shipTo->setAddress(trim($paymentDetails['physical_address_1'] . " " . $paymentDetails['physical_address_2']));
        $shipTo->setCity($paymentDetails['physical_city']);
        $shipTo->setState($paymentDetails['physical_state']);
        $shipTo->setZip($paymentDetails['physical_postal_code']);
        $shipTo->setCountry($paymentDetails['physical_country']);

        /* we don't need to charge them initial amount, just the LN fee subscription */
        if ($chargeInitialAmount) {
            $transactionRequestType = new AnetAPI\TransactionRequestType();
            $transactionRequestType->setTransactionType("authCaptureTransaction");
            $transactionRequestType->setAmount($paymentDetails['initial_payment_amount']); //payment amount here
            $transactionRequestType->setPayment($paymentOne);
            $transactionRequestType->setBillTo($billTo);
            $transactionRequestType->setShipTo($shipTo);
            $request = new AnetAPI\CreateTransactionRequest();
            $request->setMerchantAuthentication($merchantAuthentication);
            $request->setRefId($refId);
            $request->setTransactionRequest($transactionRequestType);
            $controller = new AnetController\CreateTransactionController($request);
            $controller->executeWithApiResponse(self::ANetEnvironment());
        }


        if (($response != null) && ($response->getMessages()->getResultCode() == "Ok")) {
            return [
                'status' => 'successful',
                'msg' => 'cc_transaction_ok',
                'response' => $response
            ];
        } else {
            $errorMessages = $response->getMessages()->getMessage();
            return [
                'status' => 'failed',
                'msg' => 'cc_transaction_failed',
                'error' => "Credit Card Transaction Failed : " . $errorMessages[0]->getText()
            ];
        }

    }


    public function getSubscription($subscriptionId)
    {
        /* Create a merchantAuthenticationType object with authentication details retrieved from the constants file */
        $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
        $merchantAuthentication->setName(config('services.authorize.login'));
        $merchantAuthentication->setTransactionKey(config('services.authorize.key'));

        $refId = 'ref' . time();

        // Creating the API Request with required parameters
        $request = new AnetAPI\ARBGetSubscriptionRequest();
        $request->setMerchantAuthentication($merchantAuthentication);
        $request->setRefId($refId);
        $request->setSubscriptionId($subscriptionId);

        // Controller
        $controller = new AnetController\ARBGetSubscriptionController($request);

        /** @var AnetAPI\ARBGetSubscriptionResponse $response */
        // Getting the response
        $response = $controller->executeWithApiResponse(self::ANetEnvironment());

        return $response;
    }

    public function cancelSubscription($subscriptionId)
    {
        /* Create a merchantAuthenticationType object with authentication details retrieved from the constants file */
        $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
        $merchantAuthentication->setName(config('services.authorize.login'));
        $merchantAuthentication->setTransactionKey(config('services.authorize.key'));

        // Set the transaction's refId
        $refId = 'ref' . time();
        $request = new AnetAPI\ARBCancelSubscriptionRequest();
        $request->setMerchantAuthentication($merchantAuthentication);
        $request->setRefId($refId);
        $request->setSubscriptionId($subscriptionId);
        $controller = new AnetController\ARBCancelSubscriptionController($request);
        $response = $controller->executeWithApiResponse(self::ANetEnvironment());
        if (($response != null) && ($response->getMessages()->getResultCode() == "Ok")) {
            $successMessages = $response->getMessages()->getMessage();
            return [
                'status' => 'successful',
                'msg' => $successMessages[0]->getText(),
                'response' => $response
            ];
        } else {
            $errorMessages = $response->getMessages()->getMessage();

            return [
                'status' => 'failed',
                'msg' => $errorMessages[0]->getText(),
            ];

        }
    }

    function createSubscriptionCardInfo(User $user, $cardNumber, $year_expire, $month_expire, $cvv)
    {

        /* Create a merchantAuthenticationType object with authentication details
           retrieved from the constants file */
        $lnFeeModel = LnFees::orderBy('created_at')->first();
        $paymentDetails = [
            'cc_number' => $cardNumber,
            'cc_cvv' => $cvv,
            'year_expire' => $year_expire,
            'month_expire' => $month_expire,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'mailing_address_1' => $user->mailing_address_1,
            'mailing_address_2' => $user->mailing_address_2,
            'mailing_city' => $user->mailing_city,
            'mailing_state' => $user->mailing_state,
            'mailing_postal_code' => $user->mailing_postal_code,
            'mailing_country' => $user->mailing_country,
            'physical_address_1' => $user->physical_address_1,
            'physical_address_2' => $user->physical_address_2,
            'physical_city' => $user->physical_city,
            'physical_state' => $user->physical_state,
            'physical_postal_code' => $user->physical_postal_code,
            'physical_country' => $user->physical_country,
            'subscription_amount' => $lnFeeModel->price,
            'initial_payment_amount' => $lnFeeModel->price,
        ];

        $secondAttempt = $this->processPayment($paymentDetails, false);

        if ($secondAttempt['status'] === 'successful') {
            $response = $secondAttempt['response'];
            $successMessages = $response->getMessages()->getMessage();
            $user->auth_net_subscription_id = $response->getSubscriptionId();
            $user->auth_net_profile_id = $response->getProfile()->getCustomerProfileId();
            $user->auth_net_payment_profile_id = $response->getProfile()->getCustomerPaymentProfileId();
            $user->auth_net_address_id = $response->getProfile()->getCustomerAddressId();
            $user->status = 'ACTIVE';
            $user->save();

            return [
                'status' => 'successful',
                'msg' => $successMessages[0]->getText(),
                'response' => $response
            ];
        } else {
            return [
                'status' => 'failed',
                'msg' => $secondAttempt['error'],
            ];
        }
    }

    function updateSubscriptionCardInfo($subscriptionId, $cardNumber, $year_expire, $month_expire, $cvv)
    {
        /* Create a merchantAuthenticationType object with authentication details
           retrieved from the constants file */
        $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
        $merchantAuthentication->setName(config('services.authorize.login'));
        $merchantAuthentication->setTransactionKey(config('services.authorize.key'));

        // Set the transaction's refId
        $refId = 'ref' . time();
        $subscription = new AnetAPI\ARBSubscriptionType();
        $creditCard = new AnetAPI\CreditCardType();
        $creditCard->setCardNumber($cardNumber);
        $expiry = $year_expire . '-' . $month_expire;
        $creditCard->setExpirationDate($expiry);
        $creditCard->setCardCode($cvv);
        $payment = new AnetAPI\PaymentType();
        $payment->setCreditCard($creditCard);

        $subscription->setPayment($payment);

        $request = new AnetAPI\ARBUpdateSubscriptionRequest();
        $request->setMerchantAuthentication($merchantAuthentication);
        $request->setRefId($refId);
        $request->setSubscriptionId($subscriptionId);
        $request->setSubscription($subscription);
        $controller = new AnetController\ARBUpdateSubscriptionController($request);
        /** @var AnetAPI\ARBUpdateSubscriptionResponse $response */
        $response = $controller->executeWithApiResponse(self::ANetEnvironment());

        if (($response != null) && ($response->getMessages()->getResultCode() == "Ok")) {
            $successMessages = $response->getMessages()->getMessage();

            $profile = $response->getProfile();
            $_user = User::where('auth_net_profile_id', '=', $profile->getCustomerProfileId())->first();

            if ($_user) {
                $_user->auth_net_subscription_id = $response->getSubscriptionId();
                $_user->auth_net_profile_id = $response->getProfile()->getCustomerProfileId();
                $_user->auth_net_payment_profile_id = $response->getProfile()->getCustomerPaymentProfileId();
                $_user->auth_net_address_id = $response->getProfile()->getCustomerAddressId();
                $_user->status = 'ACTIVE';
                $_user->cc_number = $cardNumber;
                $_user->cc_cvv = $cvv;
                $_user->cc_exp_date = Carbon::parse($year_expire . '-' . $month_expire);
                $_user->save();
            }

            return [
                'status' => 'successful',
                'msg' => $successMessages[0]->getText(),
                'response' => $response
            ];
        } else {

            // if failed the subscription might be cancelled or terminated
            // in this case we need to create new subscription
            // bill 1 time payment first and then create new subscription similar to registration process
            $_user = User::where('auth_net_subscription_id', '=', $subscriptionId)->first();
            $lnFeeModel = LnFees::orderBy('created_at')->first();
            $paymentDetails = [
                'cc_number' => $cardNumber,
                'cc_cvv' => $cvv,
                'year_expire' => $year_expire,
                'month_expire' => $month_expire,
                'first_name' => $_user->first_name,
                'last_name' => $_user->last_name,
                'mailing_address_1' => $_user->mailing_address_1,
                'mailing_address_2' => $_user->mailing_address_2,
                'mailing_city' => $_user->mailing_city,
                'mailing_state' => $_user->mailing_state,
                'mailing_postal_code' => $_user->mailing_postal_code,
                'mailing_country' => $_user->mailing_country,
                'physical_address_1' => $_user->physical_address_1,
                'physical_address_2' => $_user->physical_address_2,
                'physical_city' => $_user->physical_city,
                'physical_state' => $_user->physical_state,
                'physical_postal_code' => $_user->physical_postal_code,
                'physical_country' => $_user->physical_country,
                'subscription_amount' => $lnFeeModel->price,
                'initial_payment_amount' => $lnFeeModel->price,
            ];

            $secondAttempt = $this->processPayment($paymentDetails, false);

            if ($secondAttempt['status'] === 'successful') {
                $response = $secondAttempt['response'];
                $successMessages = $response->getMessages()->getMessage();
                $_user->auth_net_subscription_id = $response->getSubscriptionId();
                $_user->auth_net_profile_id = $response->getProfile()->getCustomerProfileId();
                $_user->auth_net_payment_profile_id = $response->getProfile()->getCustomerPaymentProfileId();
                $_user->auth_net_address_id = $response->getProfile()->getCustomerAddressId();
                $_user->status = 'ACTIVE';
                $_user->cc_number = $cardNumber;
                $_user->cc_cvv = $cvv;
                $_user->cc_exp_date = Carbon::parse($year_expire . '-' . $month_expire);
                $_user->save();

                return [
                    'status' => 'successful',
                    'msg' => $successMessages[0]->getText(),
                    'response' => $response
                ];
            } else {
                return [
                    'status' => 'failed',
                    'msg' => $secondAttempt['error'],
                ];
            }
        }
    }

    function getSubscriptionPaymentHistory($subscriptionId)
    {
        $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
        $merchantAuthentication->setName(config('services.authorize.login'));
        $merchantAuthentication->setTransactionKey(config('services.authorize.key'));

        $refId = 'ref' . time();

        // Creating the API Request with required parameters
        $request = new AnetAPI\ARBGetSubscriptionRequest();
        $request->setMerchantAuthentication($merchantAuthentication);
        $request->setRefId($refId);
        $request->setSubscriptionId($subscriptionId);
        $request->setIncludeTransactions(true);

        // Controller
        $controller = new AnetController\ARBGetSubscriptionController($request);

        /** @var AnetAPI\ARBGetSubscriptionResponse $response */
        // Getting the response
        $response = $controller->executeWithApiResponse(self::ANetEnvironment());

        $returnData = [];
        if ($response != null) {
            if ($response->getMessages()->getResultCode() == "Ok") {
                /*echo "<pre>SUCCESS: GetSubscription:" . "\n";
                echo "Subscription Name: " . $response->getSubscription()->getName(). "\n";
                echo "Subscription amount: " . $response->getSubscription()->getAmount(). "\n";
                echo "Subscription status: " . $response->getSubscription()->getStatus(). "\n";
                echo "Subscription Description: " . $response->getSubscription()->getProfile()->getDescription(). "\n";
                echo "Customer Profile ID: " .  $response->getSubscription()->getProfile()->getCustomerProfileId() . "\n";
                echo "Customer payment Profile ID: ". $response->getSubscription()->getProfile()->getPaymentProfile()->getCustomerPaymentProfileId() . "\n";
                */
                $transactions = $response->getSubscription()->getArbTransactions();

                if ($transactions != null) {
                    /** @var AnetAPI\ArbTransactionType $transaction */
                    foreach ($transactions as $transaction) {
                        /** @var AnetAPI\GetTransactionDetailsResponse $transactionDetails */
                        $transactionDetails = $this->getTransactionDetails($transaction->getTransId());
                        $returnData[] = [
                            'transaction_id' => $transaction->getTransId(),
                            'date' => $transaction->getSubmitTimeUTC()->format('M d Y h:i:s a'),
                            'amount' => $transactionDetails->getTransaction()->getAuthAmount(),
                            'status' => $transactionDetails->getTransaction()->getTransactionStatus(),
                        ];
                    }
                }

                return $returnData;
            } else {
                // Error
                echo "ERROR :  Invalid response\n";
                $errorMessages = $response->getMessages()->getMessage();
                echo "Response : " . $errorMessages[0]->getCode() . "  " . $errorMessages[0]->getText() . "\n";
            }
        }
    }

    function getTransactionDetails($transactionId)
    {
        /* Create a merchantAuthenticationType object with authentication details
           retrieved from the constants file */
        $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
        $merchantAuthentication->setName(config('services.authorize.login'));
        $merchantAuthentication->setTransactionKey(config('services.authorize.key'));

        $refId = 'ref' . time();

        $request = new AnetAPI\GetTransactionDetailsRequest();
        $request->setMerchantAuthentication($merchantAuthentication);
        $request->setTransId($transactionId);

        $controller = new AnetController\GetTransactionDetailsController($request);

        $response = $controller->executeWithApiResponse(self::ANetEnvironment());

        return $response;
    }

    function getCustomerProfile($profileIdRequested)
    {
        /* Create a merchantAuthenticationType object with authentication details
           retrieved from the constants file */
        $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
        $merchantAuthentication->setName(config('services.authorize.login'));
        $merchantAuthentication->setTransactionKey(config('services.authorize.key'));

        // Set the transaction's refId
        $refId = 'ref' . time();
        // Retrieve an existing customer profile along with all the associated payment profiles and shipping addresses

        $request = new AnetAPI\GetCustomerProfileRequest();
        $request->setMerchantAuthentication($merchantAuthentication);
        $request->setCustomerProfileId($profileIdRequested);
        $controller = new AnetController\GetCustomerProfileController($request);
        $response = $controller->executeWithApiResponse(self::ANetEnvironment());

        if (($response != null) && ($response->getMessages()->getResultCode() == "Ok")) {
            echo "GetCustomerProfile SUCCESS : " . "\n";
            $profileSelected = $response->getProfile();
            $paymentProfilesSelected = $profileSelected->getPaymentProfiles();
            echo "Profile Has " . count($paymentProfilesSelected) . " Payment Profiles" . "\n";

            if ($response->getSubscriptionIds() != null) {
                if ($response->getSubscriptionIds() != null) {

                    echo "List of subscriptions:";
                    foreach ($response->getSubscriptionIds() as $subscriptionid)
                        echo $subscriptionid . "\n";
                }
            }
        } else {
            echo "ERROR :  GetCustomerProfile: Invalid response\n";
            $errorMessages = $response->getMessages()->getMessage();
            echo "Response : " . $errorMessages[0]->getCode() . "  " . $errorMessages[0]->getText() . "\n";
        }
        return $response;
    }

    public function processEliteChallengePayment(array $paymentDetails)
    {
        // Common setup for API credentials
        $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
        $merchantAuthentication->setName(config('services.authorize.login'));
        $merchantAuthentication->setTransactionKey(config('services.authorize.key'));
        $refId = 'ref' . time();
        // Create the payment data for a credit card
        $creditCard = new AnetAPI\CreditCardType();
        $creditCard->setCardNumber($paymentDetails['cc_number']);
        $creditCard->setCardCode($paymentDetails['cc_cvv']);


        $expiry = $paymentDetails['year_expire'] . '-' . $paymentDetails['month_expire'];
        $creditCard->setExpirationDate($expiry);
        $paymentOne = new AnetAPI\PaymentType();
        $paymentOne->setCreditCard($creditCard);

        $transactionRequestType = new AnetAPI\TransactionRequestType();
        $transactionRequestType->setTransactionType("authCaptureTransaction");
        $transactionRequestType->setAmount($paymentDetails['payment_amount']);
        $transactionRequestType->setPayment($paymentOne);
        $request = new AnetAPI\CreateTransactionRequest();
        $request->setMerchantAuthentication($merchantAuthentication);
        $request->setRefId($refId);
        $request->setTransactionRequest($transactionRequestType);
        $controller = new AnetController\CreateTransactionController($request);
        $response = $controller->executeWithApiResponse(self::ANetEnvironment());

        if (($response != null) && ($response->getMessages()->getResultCode() == "Ok")) {
            return [
                'status' => 'successful',
                'msg' => 'cc_transaction_ok',
                'response' => $response
            ];
        } else {
            $errorMessages = $response->getMessages()->getMessage();
            return [
                'status' => 'failed',
                'msg' => 'cc_transaction_failed',
                'error' => "Credit Card Transaction Failed : " . $errorMessages[0]->getText()
            ];
        }

    }

       public function processSinglePayment(array $paymentDetails)
    {
        // Common setup for API credentials
        $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
        $merchantAuthentication->setName("7Ruge9ZL9k");
        $merchantAuthentication->setTransactionKey("586P9Z6xdDZ64anR");
        $refId = 'ref' . time();
        // Create the payment data for a credit card
        $creditCard = new AnetAPI\CreditCardType();
        $creditCard->setCardNumber($paymentDetails['cc_number']);
        $creditCard->setCardCode($paymentDetails['cc_cvv']);


        $expiry = $paymentDetails['year_expire'] . '-' . $paymentDetails['month_expire'];
        $creditCard->setExpirationDate($expiry);
        $paymentOne = new AnetAPI\PaymentType();
        $paymentOne->setCreditCard($creditCard);

        $transactionRequestType = new AnetAPI\TransactionRequestType();
        $transactionRequestType->setTransactionType("authCaptureTransaction");
        $transactionRequestType->setAmount($paymentDetails['amount']);
        $transactionRequestType->setPayment($paymentOne);
        $request = new AnetAPI\CreateTransactionRequest();
        $request->setMerchantAuthentication($merchantAuthentication);
        $request->setRefId($refId);
        $request->setTransactionRequest($transactionRequestType);
        $controller = new AnetController\CreateTransactionController($request);
        $response = $controller->executeWithApiResponse(self::ANetEnvironment());

        $tresponse = $response->getTransactionResponse();

        if (($response != null) && ($response->getMessages()->getResultCode() == "Ok")) {
            return [
                'status' => 'successful',
                'redID' =>  $refId,
                'transactionId' => $tresponse->getTransId(),
                'msg' => 'cc_transaction_ok',
                'response' => $response
            ];
        } else {
            $errorMessages = $response->getMessages()->getMessage();
            return [
                'status' => 'failed',
                'msg' => 'cc_transaction_failed',
                'error' => "Credit Card Transaction Failed : " . $errorMessages[0]->getText()
            ];
        }

    }
}