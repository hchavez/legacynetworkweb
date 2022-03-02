<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::resource('user', 'Api\UserController')->only(['index']);
Route::post('user/cancelSubscription', 'Api\UserController@cancelSubscription');
Route::post('user/updatePaymentInfo', 'Api\UserController@processUpdatePaymentInfo');
Route::post('user/updatePersonalDetails', 'Api\UserController@updatePersonalDetails');
Route::get('user/memberPlacement', 'Api\UserController@getMemberPlacement');
Route::post('user/memberPlacement/setPlacement', 'Api\UserController@setPlacement');
Route::get('user/team_members', 'Api\UserController@getTeamMembers');
Route::get('user/challenge_members', 'Api\UserController@getChallengeMembers');
Route::get('user/pending_training_team_members', 'Api\UserController@getPendingTrainingTeamMembers');
Route::get('user/pending_challenge_members', 'Api\UserController@getPendingChallengeMembers');
Route::get('user/pending_placement_team_members', 'Api\UserController@getPendingPlacementTeamMembers');
Route::get('user/achievement_level', 'Api\UserController@getAchievementLevel');
Route::get('user/invited_to_meetings', 'Api\UserController@getInvitedToMeetings');
Route::get('user/created_meetings', 'Api\UserController@getCreatedMeetings');
Route::get('user/sponsor', 'Api\UserController@getSponsor');
Route::get('user/member_commitment', 'Api\UserController@getMemberCommitment');
Route::get('user/sponsored_list', 'Api\UserController@getSponsoredList');
Route::get('user/payment_history', 'Api\UserController@getSubscriptionPaymentHistory');
Route::get('user/update_payment_info', 'Api\UserController@showUpdatePaymentInfo');
Route::post('user/update_payment_info', 'Api\UserController@processUpdatePaymentInfo');
Route::get('user/display_purl', 'Api\UserController@showPurlChange');
Route::get('user/change_autoship', 'Api\DistributorController@changeAutoship');


Route::get('user/health_challenge_participants', 'Api\UserController@getHealthChallengeParticipants');
Route::post('user/resend_health_challenge_emails', 'Api\UserController@resendHealthChallengeEmails');
Route::post('user/notify_sponsor_for_certification', 'Api\UserController@notifySponsorForCertification');


//Distributor
Route::get('distributor/achievementLevels', 'Api\DistributorController@getAchievementLevels');
Route::get('distributor/advancedAchievements', 'Api\DistributorController@getAdvancedAchievements');
Route::get('distributor/bonusPaths', 'Api\DistributorController@getBonusPaths');
Route::post('distributor/send_email', 'Api\DistributorController@sendEliteHealthChallengeEmail');
Route::post('distributor/notify_sponsor_for_certification', 'Api\DistributorController@notifySponsorForCertification');
Route::get('distributor/get_member_placement', 'Api\DistributorController@getMemberPlacement');
Route::post('distributor/team_meetings_lead', 'Api\DistributorController@lead');
Route::post('distributor/send_invite', 'Api\DistributorController@send_invite');
Route::post('distributor/file_upload', 'Api\DistributorController@file_upload');

Route::prefix('success_compass')->group(function () {
    Route::resource('goals', 'Api\SuccessCompass\GoalsController')->only(['index', 'store']);
    Route::resource('next_step_goals', 'Api\SuccessCompass\NextStepGoalsController')->only(['index', 'store']);
    Route::resource('weekly_actions', 'Api\SuccessCompass\WeeklyActionsController')->only(['index', 'show', 'store', 'destroy']);
    Route::resource('weekly_action_items', 'Api\SuccessCompass\WeeklyActionItemsController')->only(['show', 'destroy']);
    Route::resource('ResultsController', 'Api\SuccessCompass\ResultsController')->only(['index', 'store']);
});

