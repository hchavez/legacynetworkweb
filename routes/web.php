<?php

Route::get('distributor/tools/send_invites','SendInvitesController@index');
Route::get('distributor/tools/send_invitesto','SendInvitesController@send_invitesto');
Route::get('distributor/tools/send_invites/reports','SendInvitesController@reports');
Route::post('distributor/tools/send_invites/count','SendInvitesController@count')->name('send_invites.count');
Route::post('distributor/tools/create','SendInvitesController@store');
Route::delete('distributor/tools/invite_delete_all', 'UserController@deleteAllUserInvite');


Route::get('shared/{id}','SendInvitesController@show');
Route::get('text','SendInvitesController@text');
Route::post('order_card', 'BusinessCardsController@order_card')->name('order_card');
Route::get('printpdf','MerchandiseController@printpdf');
Route::get('send_email_challenge', 'PublicControllers\PagesController@sendEmailChallenge');



Auth::routes();

Route::prefix('/')->group(function () {
    /** Main Navigation Routes */
    Route::get('/', 'HomeController@index');
    Route::get('helping_entrepreneurs_leave_a_legacy', function() { return redirect('/'); });
//    Route::get('commissions', 'HomeController@commissions');
    Route::get('clinical_studies', function() { return redirect('/'); });
    Route::get('elite_business_system', function() { return redirect('/'); });
    Route::get('leadership_summits', 'HomeController@leadership_summits');
    Route::get('business_overview', function() { return redirect('/'); });
    Route::get('biome', 'HomeController@biome');
    Route::get('a_strong_partner', function() { return redirect('/'); });
    Route::get('give_back', function() { return redirect('/'); });
    Route::get('clinically_proven_products', function() { return redirect('/'); });
    Route::get('live-broadcast', 'HomeController@live_broadcast');
    Route::get('business-page', function() { return redirect('/'); });
//    Route::get('leave-a-legacy', 'HomeController@leave_a_legacy');
    Route::get('product-information', function() { return redirect('/'); });
    Route::get('guest-calendar', 'HomeController@guest_calendar');
    Route::get('ehc-calendar', 'HomeController@ehc_calendar');
//    Route::get('contact', 'HomeController@contact');
//    Route::get('ehc-contact', 'HomeController@ehc_contact');
    Route::get('tech-support', 'HomeController@tech_support');
    Route::get('customer-service', 'HomeController@customer_service');
    Route::get('get-started', 'HomeController@get_started');
    Route::get('get-started/step/0', 'HomeController@get_started_step_0');
    Route::get('get-started/step/1', 'HomeController@get_started_step_1');
    Route::get('get-started/step/2', 'HomeController@get_started_step_2');
    Route::get('get-started/step/3', 'HomeController@get_started_step_3');
    Route::get('get-started/step/4', 'HomeController@get_started_step_4');
    Route::get('get-started/step/5', 'HomeController@get_started_step_5');
    Route::get('resend_welcome_email', 'HomeController@resend_welcome_email');

    /** For Synergy User Registration*/
    Route::get('synergy-user', 'HomeController@synergy_user_0');
    Route::get('synergy-user/step/0', 'HomeController@synergy_user_0');
    Route::get('synergy-user/step/1', 'HomeController@synergy_user_1');
    Route::get('synergy-user/step/2', 'HomeController@synergy_user_2');
    Route::get('synergy-user/step/3', 'HomeController@synergy_user_3');
    Route::get('synergy-user/step/4', 'HomeController@synergy_user_4');
    Route::get('synergy-user/step/5', 'HomeController@synergy_user_5');

    /** Hidden links */
    Route::get('faq', 'HomeController@faq');
    Route::get('business-presentation', function() { return redirect('/'); });
    Route::get('terms-and-conditions', 'HomeController@terms_and_conditions');

    /** AJAX POST Routes */
    Route::post('live-broadcast/comments', 'BroadcastCommentsController@store');
    Route::get('live-broadcast/comments/poll', 'BroadcastCommentsController@polling');
    Route::post('live-broadcast/comments/mass_delete', 'BroadcastCommentsController@mass_delete');
    Route::post('public_calendar_events/{type_id}', 'PublicCalendarEventsController@index');
    Route::post('resend_welcome_email', 'HomeController@process_resend_welcome_email')->name('resend_welcome_email');
    Route::post('generateWidgets', 'HomeController@generateWidgets');
    Route::post('register_user', 'Auth\RegisterController@register');
    Route::post('register_user/step/0', 'Auth\RegisterController@register_step_0');
    Route::post('register_user/step/1', 'Auth\RegisterController@register_step_1');
    Route::post('register_user/step/2', 'Auth\RegisterController@register_step_2');
    Route::post('register_user/step/3', 'Auth\RegisterController@register_step_3');
    Route::post('register_user/step/4', 'Auth\RegisterController@register_step_4');
    Route::post('register_user/step/5', 'Auth\RegisterController@register_step_5');
    #Synergy user
    Route::post('synergy_user/step/0', 'Auth\RegisterController@synergy_step_0');
    Route::post('synergy_user/step/1', 'Auth\RegisterController@synergy_step_1');
    Route::post('synergy_user/step/2', 'Auth\RegisterController@synergy_step_2');
    Route::post('synergy_user/step/3', 'Auth\RegisterController@synergy_step_3');
    Route::post('synergy_user/step/4', 'Auth\RegisterController@synergy_step_4');
    Route::post('synergy_user/step/5', 'Auth\RegisterController@synergy_step_5');
    Route::post('check_purl', 'UserController@checkPurl');

});

Route::middleware('auth')->group(function () {
    Route::get('impersonate/{id}', function ($id) {
//        if (env('APP_ENV') == 'local' || env('APP_ENV') == 'staging') {
            $user = \App\User::find($id);
            Auth::login($user);
            return redirect('/distributors');
//        }
//       return redirect('/');
    });
    Route::resource('achievement_approvals', 'AchievementApprovalsController');
    Route::resource('notification_messages', 'NotificationMessagesController');
    Route::resource('user_events', 'UserEventsController');
    Route::resource('users', 'UserController');
    Route::resource('ent_training_progress', 'EntrepreneurshipTrainingProgressController');
    Route::get('ent_training_progress/get_training/{id}', 'EntrepreneurshipTrainingProgressController@getTraining');
    Route::post('ent_training_progress/updateVideo/{id}', 'EntrepreneurshipTrainingProgressController@updateVideo');
    Route::post('users/payment_declined/{id}', 'UserController@payment_declined');
    Route::post('users/ehc_payment_declined/{id}', 'UserController@ehc_payment_declined');
    Route::post('users/notify_sponsor_for_certification', 'UserController@notify_sponsor_for_certification');
    Route::get('users/member_pdf/{id}', 'UserController@member_pdf');
    Route::get('users/customer_application/{id}', 'UserController@elite_challenge_pdf');
    Route::post('users/member_direct_deposit_form', 'UserController@member_direct_deposit_form');

    Route::prefix('distributor')->middleware(['auth', 'role:Distributor', 'activeUsersOnly'])->group(function () {

        Route::get('/', 'DistributorController@getDistributorDashboard')->name('distributor');
        Route::post('set_placement', 'DistributorController@setPlacement');
        Route::post('set_training_status', 'DistributorController@setTrainingStatus');
        Route::post('profile', 'UserController@update_avatar');
        Route::get('team_viewer/{id}', 'DistributorController@getDistributorTeamViewer');
        Route::post('set_prod_details/{id}', function(\Illuminate\Http\Request $request, $id) {
            Cache::forget($id);
            Cache::rememberForever($id, function() use ($request) {
                return $request->input('value');
            });
        });


        Route::prefix('business_building')->group(function () {
            Route::resource('success_compass', 'SuccessCompassController');
            Route::get('success_compass_business', 'SuccessCompassController@showBusinessCompass');
            Route::post('set_user_health_goal', 'UserHealthGoalsController@setUserHealthGoal');
            Route::post('set_user_next_step_goals', 'UserNextStepGoalsController@setUserNextGoal');
            Route::post('set_user_goal_results', 'UserGoalResultsController@setResults');
            Route::post('set_user_health_action_item', 'UserHealthActionItemsController@setItem');
            Route::post('clone_user_health_action_items', 'UserHealthActionItemsController@cloneItems');
            Route::post('delete_user_health_action_item', 'UserHealthActionItemsController@deleteItem');
            Route::get('get_user_health_action_items', 'UserHealthActionsController@getItems');
            Route::post('toggle_user_health_action_item_day', 'UserHealthActionItemDaysController@toggleItem');
            Route::post('success_compass/change_status', 'SuccessCompassController@changeStatus');
//            Route::resource('member_invites', 'MemberInvitesController');
            Route::post('member_invites/resend', 'MemberInvitesController@resend');
            Route::resource('member_certification', 'MemberCertificationController');
            Route::get('member_placement', 'MemberCertificationController@showMemberPlacement');
            Route::resource('marketing_compliance', 'MarketingComplianceController');
            Route::get('product_list', 'MerchandiseController@productList');
            Route::get('product/{id}', 'MerchandiseController@product');
            Route::post('cart','OrderController@addToCart')->name('cart');
            Route::get('purchase_business_cards', 'BusinessCardsController@businesscardstList');

            Route::get('add-to-cart/{id}', 'OrderController@addToCart');
            Route::get('delete-item/{id}','OrderController@deleteItem');

            Route::post('checkout', 'OrderController@checkout')->name('checkout');
            Route::post('confirm_payment', 'OrderController@confirm_payment')->name('confirm_payment');

        });

        Route::prefix('team_meetings')->group(function () {
            Route::get('lead', 'MeetingsController@index');
            Route::get('certification_meeting_outline', 'MeetingsController@certification_meeting_outline');
            Route::get('create', 'MeetingsController@create');
            Route::post('create', 'MeetingsController@store');
        });

        Route::prefix('training')->group(function () {
            //Route::get('product/{id}', 'MerchandiseController@product');
            Route::get('user_entrepreneurship_training/{id}','EntrepreneurshipTrainingController@userEntrepreneurshipTraining');

            Route::resource('entrepreneurship_training', 'EntrepreneurshipTrainingController');
            Route::resource('team_members', 'TeamMembersController');
            Route::get('health_challenge_participants', 'TeamMembersController@health_challenge_participants');
            Route::post('health_challenge_participants/resend_ehc_emails', 'TeamMembersController@resend_health_challenge_emails');
            Route::get('leadership_live', 'EntrepreneurshipTrainingController@leadershipLive');
            Route::resource('compensation', 'CompensationController');
            Route::post('ent_training_progress/updateVideo/{id}', 'EntrepreneurshipTrainingProgressController@updateVideo');
            Route::post('addcustomer', 'TeamMembersController@add_customer');
        });

        Route::prefix('settings')->group(function () {
            Route::get('purl_change', 'UserController@showPurlChange');
            Route::get('password_change', 'UserController@showPasswordChange');
            Route::get('personal_details', 'UserController@showPersonalDetails');
            Route::get('preview', 'UserController@showUserPreview');
            Route::get('notifications', 'UserController@showUserNotifications');

            Route::delete('notifications/{id}', 'UserController@deleteUserNotifications');
            Route::delete('notification_delete_all', 'UserController@deleteAllUserNotifications');

            Route::get('notifications_mass_delete', 'UserController@NotificationMassDelete');
            Route::get('subscription', 'UserController@showSubscription');
            Route::post('subscription/cancel', 'UserController@cancelSubscription');
            Route::get('update_payment_info', 'UserController@showUpdatePaymentInfo');
            Route::post('update_payment_info', 'UserController@processUpdatePaymentInfo');
            Route::get('payment_history', 'UserController@getSubscriptionPaymentHistory');
        });

        Route::prefix('library')->group(function () {
            Route::get('training_workbook', 'EntrepreneurshipTrainingController@workbook');
        });

        Route::prefix('support')->group(function () {
            Route::post('upload', 'SupportTicketController@store');
            Route::get('open_ticket', 'SupportTicketController@create');
            Route::resource('tickets', 'SupportTicketController');
            Route::resource('ticket_comments', 'SupportTicketCommentsController');
            Route::resource('faq', 'SupportFaqController');
        });

        Route::prefix('products')->group(function () {
            Route::get('product_usage', 'DistributorController@productUsage');
            Route::get('product_training', 'DistributorController@productTraining');
            Route::get('product_testimonials', 'DistributorController@productTestimonials');
            Route::get('change_autoship', 'DistributorController@changeAutoship');
            Route::get('biome', 'DistributorController@biome');
            Route::get('leave_a_legacy', 'DistributorController@leaveALegacy');
            Route::get('elite_health_challenge', 'DistributorController@eliteHealthChallenge');
            Route::post('elite_health_challenge/send_email', 'DistributorController@sendEliteHealthChallengeEmail');
        });

        Route::prefix('tools')->group(function () {
            Route::get('ehc_videos', 'DistributorController@ehcVideos');
            Route::get('product_videos', 'DistributorController@productVideos');
            Route::get('business_videos', 'DistributorController@businessVideos');
            Route::get('business_cards', 'DistributorController@businessCards');
            //Route::resource('send_invites', 'SendInvitesController');
            //Route::post('send_invites','SendInvitesController@postSendInvite');


            Route::post('file_upload', 'FileUploaderController@fileUpload');
        });

    });

    Route::prefix('legacy_admin')->middleware(['auth', 'role:Legacy|Synergy'])->group(function () {
        Route::get('/', 'AdminController@index');
        Route::post('/mce_image_upload', 'AdminDistributorController@mce_image_upload');
        Route::resource('support_tickets', 'AdminTicketsController');
        Route::resource('support_tickets_categories', 'AdminTicketCategoriesController');



        Route::prefix('legacy')->middleware(['auth', 'role:Legacy'])->group(function () {
            Route::resource('distributors', 'AdminDistributorController');
            Route::resource('live_broadcast', 'AdminLiveBroadcastController');
            Route::resource('events', 'AdminEventsController');
            Route::resource('broadcast_comments', 'AdminBroadcastCommentsController');
            Route::resource('faq_categories', 'AdminFaqCategoriesController');
            Route::resource('faq', 'AdminFaqController');
            Route::resource('products', 'AdminProductsController');
            Route::resource('merchandise', 'AdminMerchandiseController');
            Route::resource('orders', 'AdminOrdersController');
            Route::resource('business_cards', 'AdminBusinessCardsController');
            Route::resource('notifications', 'AdminUserNotificationsController');
            Route::resource('mail_achievement', 'AdminMailAchievementController');
            Route::resource('mail_challenge', 'AdminMailChallengeController');
            Route::delete('deleteAll_notifications', 'AdminUserNotificationsController@deleteAllUserNotifications');

            Route::get('public_calendar_events/{id}/duplicate', 'AdminPublicCalendarEventsController@duplicate');
            Route::resource('public_calendar_events', 'AdminPublicCalendarEventsController');
            Route::resource('activation_packs', 'AdminActivationPacksController');
            Route::resource('auto_ships', 'AdminAutoShipsController');
            Route::resource('ln_fees', 'AdminLnFeesController');
            Route::post('merchandise/image', 'AdminMerchandiseController@update_image');
            Route::post('products/image', 'AdminProductsController@update_image');
            Route::post('activation_packs/image', 'AdminActivationPacksController@update_image');
            Route::post('auto_ships/image', 'AdminAutoShipsController@update_image');
            Route::post('ln_fees/image', 'AdminLnFeesController@update_image');



        });

        Route::prefix('synergy')->group(function () {
            Route::get('bonus_path', 'AdminController@showSynergyPage');
            Route::get('additional_awards', 'AdminController@showAdditoinalRequests');
            Route::resource('enrollment', 'AdminEnrollmentController');
            Route::resource('elite_challenge', 'AdminEliteChallengeController');
        });

        Route::get('send_email', 'AdminDistributorController@showSendEmail')->middleware(['auth', 'role:Legacy']);
        Route::post('send_email', 'AdminDistributorController@processSendEmail')->middleware(['auth', 'role:Legacy']);

        Route::prefix('dt')->group(function () {
            Route::get('/distributors', 'AdminDataTableController@getDistributors');
            Route::get('/events', 'AdminDataTableController@getEvents');
            Route::get('/bonus_path_requests', 'AdminDataTableController@getBonusPathRequests');
            Route::get('/additional_awards', 'AdminDataTableController@getAdditionalAwardsRequests');
            Route::get('/enrollment', 'AdminDataTableController@getEnrollment');
            Route::get('/elite_challenge', 'AdminDataTableController@getEliteChallengeSignups');
            Route::get('/support_tickets', 'AdminDataTableController@getSupportTickets');
            Route::get('/support_ticket_categories', 'AdminDataTableController@getSupportTicketCategories');
            Route::get('/broadcast_comments', 'AdminDataTableController@getBroadcastComments');
            Route::get('/notifications', 'AdminDataTableController@getNotifications');
            Route::get('/faq_categories', 'AdminDataTableController@getFaqCategories');
            Route::get('/faq', 'AdminDataTableController@getFaq');
            Route::get('/products', 'AdminDataTableController@getProducts');
            Route::get('/public_calendar_events', 'AdminDataTableController@getPublicCalendarEvents');
            Route::get('/activation_packs', 'AdminDataTableController@getActivationPacks');
            Route::get('/auto_ships', 'AdminDataTableController@getAutoShips');
            Route::get('/ln_fees', 'AdminDataTableController@getLnFees');
            Route::get('/businesscards', 'AdminDataTableController@getBusinessCards');
            Route::get('/merchandise', 'AdminDataTableController@getMerchandise');
            Route::get('/mail_achievement', 'AdminDataTableController@getMailAchievement');
            Route::get('/mail_challenge', 'AdminDataTableController@getMailChallenge');
        });
    });

});
Route::get('/logout', function() {
    Auth::logout();
    return redirect('/');
});

Route::get('/sacsacsac', function() {
    /** @var \App\Services\UsersServices $s */
    $s = app()->make(\App\Services\UsersServices::class);

    $s->validateUserSubscriptions();
});

Route::get('/email-trigger', function() {
    $user = \App\User::find(36);
    $otherUser = \App\User::find(31);
    $meeting = \App\Models\Meetings::all()->first();

    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\EliteChallengeWelcomeMail());
    sleep(2);
    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\EliteChallengeSponsorMail($user));
    sleep(2);
    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\EliteChallengeDay1Email());
    sleep(2);
    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\EliteChallengeDay2Email());
    sleep(2);
    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\EliteChallengeDay3Email());
    sleep(2);
    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\EliteChallengeDay4Email());
    sleep(2);
    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\EliteChallengeDay5Email());
    sleep(2);
    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\EliteChallengeDay6Email());
    sleep(2);
    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\EliteChallengeDay7Email());
    sleep(2);
    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\EliteChallengeDay8Email());
    sleep(2);
    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\EliteChallengeDay15Email());
    sleep(2);
    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\EliteChallengeDay21Email());
    sleep(2);

//    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\CertificationMeetingCreatedOtherInvites($user, $meeting, $otherUser));
    sleep(2);
    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\MeetingCreated($user));
    sleep(2);
    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\MemberAchievementApproved($user, \App\Models\BonusPaths::find(1)));
    sleep(2);
    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\MemberAchievementApproved($user, \App\Models\BonusPaths::find(2)));
    sleep(2);
    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\MemberAchievementApproved($user, \App\Models\BonusPaths::find(3)));
    sleep(2);
//    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\MemberAchievementApproved($user, \App\Models\AchievementLevels::find(1)));
    sleep(2);
    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\MemberAchievementApproved($user, \App\Models\AchievementLevels::find(2)));
    sleep(2);
    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\MemberAchievementApproved($user, \App\Models\AchievementLevels::find(3)));
    sleep(2);
    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\MemberAchievementApproved($user, \App\Models\AchievementLevels::find(4)));
    sleep(2);
    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\MemberAchievementApproved($user, \App\Models\AchievementLevels::find(5)));
    sleep(2);
    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\MemberAchievementApproved($user, \App\Models\AchievementLevels::find(6)));
    sleep(2);
    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\MemberAchievementApproved($user, \App\Models\AchievementLevels::find(7)));
    sleep(2);
    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\MemberAchievementApproved($user, \App\Models\AchievementLevels::find(8)));
    sleep(2);
    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\MemberAchievementApproved($user, \App\Models\AchievementLevels::find(9)));
    sleep(2);
    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\MemberAchievementApproved($user, \App\Models\AchievementLevels::find(10)));
    sleep(2);
    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\MemberAchievementApproved($user, \App\Models\AchievementLevels::find(11)));
    sleep(2);
    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\MemberAchievementApproved($user, \App\Models\AchievementLevels::find(12)));
    sleep(2);
    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\MemberAchievementApproved($user, \App\Models\AchievementLevels::find(13)));
    sleep(2);

//
//    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\MemberAchievementDeclined($user, \App\Models\BonusPaths::find(1)));
//    sleep(2);
//    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\MemberAchievementDeclined($user, \App\Models\BonusPaths::find(2)));
//    sleep(2);
//    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\MemberAchievementDeclined($user, \App\Models\BonusPaths::find(3)));
//    sleep(2);
//    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\MemberAchievementDeclined($user, \App\Models\AchievementLevels::find(1)));
//    sleep(2);
//    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\MemberAchievementDeclined($user, \App\Models\AchievementLevels::find(2)));
//    sleep(2);
//    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\MemberAchievementDeclined($user, \App\Models\AchievementLevels::find(3)));
//    sleep(2);
//    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\MemberAchievementDeclined($user, \App\Models\AchievementLevels::find(4)));
//    sleep(2);
//    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\MemberAchievementDeclined($user, \App\Models\AchievementLevels::find(5)));
//    sleep(2);
//    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\MemberAchievementDeclined($user, \App\Models\AchievementLevels::find(6)));
//    sleep(2);
//    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\MemberAchievementDeclined($user, \App\Models\AchievementLevels::find(7)));
//    sleep(2);
//    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\MemberAchievementDeclined($user, \App\Models\AchievementLevels::find(8)));
//    sleep(2);
//    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\MemberAchievementDeclined($user, \App\Models\AchievementLevels::find(9)));
//    sleep(2);
//    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\MemberAchievementDeclined($user, \App\Models\AchievementLevels::find(10)));
//    sleep(2);
//    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\MemberAchievementDeclined($user, \App\Models\AchievementLevels::find(11)));
//    sleep(2);
//    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\MemberAchievementDeclined($user, \App\Models\AchievementLevels::find(12)));
//    sleep(2);
//    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\MemberAchievementDeclined($user, \App\Models\AchievementLevels::find(13)));
//    sleep(2);

//    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\NewTeamMemberPlacement($user));
//    sleep(2);

    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\NotifySponsorNewSignUp($user->sponsor, $user));
    sleep(2);

    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\PaymentDeclinedMail($user));
    sleep(2);
    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\PaymentDeclinedMailEhc($user));
    sleep(2);
    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\PaymentDeclinedMailEbc($user));
    sleep(2);

    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\RegisterSuccessful($user));
    sleep(2);


    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\SponsorAchievementByMemberApproved($user,$user->sponsor, \App\Models\BonusPaths::find(1)));
    sleep(2);
    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\SponsorAchievementByMemberApproved($user,$user->sponsor, \App\Models\BonusPaths::find(2)));
    sleep(2);
    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\SponsorAchievementByMemberApproved($user,$user->sponsor, \App\Models\BonusPaths::find(3)));
    sleep(2);
//    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\SponsorAchievementByMemberApproved($user,$user->sponsor, \App\Models\AchievementLevels::find(1)));
    sleep(2);
    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\SponsorAchievementByMemberApproved($user,$user->sponsor, \App\Models\AchievementLevels::find(2)));
    sleep(2);
    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\SponsorAchievementByMemberApproved($user,$user->sponsor, \App\Models\AchievementLevels::find(3)));
    sleep(2);
    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\SponsorAchievementByMemberApproved($user,$user->sponsor, \App\Models\AchievementLevels::find(4)));
    sleep(2);
    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\SponsorAchievementByMemberApproved($user,$user->sponsor, \App\Models\AchievementLevels::find(5)));
    sleep(2);
    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\SponsorAchievementByMemberApproved($user,$user->sponsor, \App\Models\AchievementLevels::find(6)));
    sleep(2);
    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\SponsorAchievementByMemberApproved($user,$user->sponsor, \App\Models\AchievementLevels::find(7)));
    sleep(2);
    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\SponsorAchievementByMemberApproved($user,$user->sponsor, \App\Models\AchievementLevels::find(8)));
    sleep(2);
    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\SponsorAchievementByMemberApproved($user,$user->sponsor, \App\Models\AchievementLevels::find(9)));
    sleep(2);
    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\SponsorAchievementByMemberApproved($user,$user->sponsor, \App\Models\AchievementLevels::find(10)));
    sleep(2);
    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\SponsorAchievementByMemberApproved($user,$user->sponsor, \App\Models\AchievementLevels::find(11)));
    sleep(2);
    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\SponsorAchievementByMemberApproved($user,$user->sponsor, \App\Models\AchievementLevels::find(12)));
    sleep(2);
    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\SponsorAchievementByMemberApproved($user,$user->sponsor, \App\Models\AchievementLevels::find(13)));
    sleep(2);
//
//    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\SponsorAchievementByMemberDeclined($user,$user->sponsor, \App\Models\BonusPaths::find(1)));
//    sleep(2);
//    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\SponsorAchievementByMemberDeclined($user,$user->sponsor, \App\Models\BonusPaths::find(2)));
//    sleep(2);
//    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\SponsorAchievementByMemberDeclined($user,$user->sponsor, \App\Models\BonusPaths::find(3)));
//    sleep(2);
//    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\SponsorAchievementByMemberDeclined($user,$user->sponsor, \App\Models\AchievementLevels::find(1)));
//    sleep(2);
//    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\SponsorAchievementByMemberDeclined($user,$user->sponsor, \App\Models\AchievementLevels::find(2)));
//    sleep(2);
//    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\SponsorAchievementByMemberDeclined($user,$user->sponsor, \App\Models\AchievementLevels::find(3)));
//    sleep(2);
//    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\SponsorAchievementByMemberDeclined($user,$user->sponsor, \App\Models\AchievementLevels::find(4)));
//    sleep(2);
//    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\SponsorAchievementByMemberDeclined($user,$user->sponsor, \App\Models\AchievementLevels::find(5)));
//    sleep(2);
//    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\SponsorAchievementByMemberDeclined($user,$user->sponsor, \App\Models\AchievementLevels::find(6)));
//    sleep(2);
//    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\SponsorAchievementByMemberDeclined($user,$user->sponsor, \App\Models\AchievementLevels::find(7)));
//    sleep(2);
//    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\SponsorAchievementByMemberDeclined($user,$user->sponsor, \App\Models\AchievementLevels::find(8)));
//    sleep(2);
//    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\SponsorAchievementByMemberDeclined($user,$user->sponsor, \App\Models\AchievementLevels::find(9)));
//    sleep(2);
//    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\SponsorAchievementByMemberDeclined($user,$user->sponsor, \App\Models\AchievementLevels::find(10)));
//    sleep(2);
//    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\SponsorAchievementByMemberDeclined($user,$user->sponsor, \App\Models\AchievementLevels::find(11)));
//    sleep(2);
//    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\SponsorAchievementByMemberDeclined($user,$user->sponsor, \App\Models\AchievementLevels::find(12)));
//    sleep(2);
//    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\SponsorAchievementByMemberDeclined($user,$user->sponsor, \App\Models\AchievementLevels::find(13)));
//    sleep(2);

//    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\TeamMeetingCreatedForParticipants($user, $meeting, $otherUser));
//    sleep(2);
//    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\TeamMeetingCreatedForSponsor($user, $meeting));
    sleep(2);
    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\TrainingDone($user));
    sleep(2);
    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\UserSignUp($user));

});



Route::post('search/{resource}', 'SearchController@search');







