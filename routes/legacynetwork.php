<?php

//Route::prefix('/')->group(function () {
//    Route::get('elite_challenge', 'PublicControllers\PagesController@showEliteChallenge');
    Route::get('/', 'PublicControllers\PagesController@showHomePage');
    Route::get('cardio-health', 'PublicControllers\PagesController@showCardioHealth');
    Route::get('skin-care', 'PublicControllers\PagesController@showSkinCare');
    Route::get('immune-support', 'PublicControllers\PagesController@showImmuneSupport');
    Route::get('weight-loss', 'PublicControllers\PagesController@showEliteChallenge');
    Route::get('benefits', 'PublicControllers\PagesController@showBenefitsPage');
    Route::get('business', 'PublicControllers\PagesController@showBusinessPage');
    Route::get('business/{purl}', 'PurlController@setPurlSession');
    Route::get('business_page/{section}/{type?}', 'PublicControllers\PagesController@showBusinessPageSection');
    Route::get('product_page/{section}', 'PublicControllers\PagesController@showProductPageSection');
    Route::get('products', 'PublicControllers\PagesController@showProductsPage');
    Route::get('buy_products', 'PublicControllers\PagesController@showBuyProductsPage');
    Route::post('contact/send_message', 'PublicControllers\PagesController@contact_send_message');
    Route::get('contact', 'PublicControllers\PagesController@contact');
    Route::get('ehc-contact', 'PublicControllers\PagesController@ehcConctact');
    Route::get('leave-a-legacy', 'PublicControllers\PagesController@leaveALegacy');
    Route::get('commissions', 'PublicControllers\PagesController@showCommissionsPage');

    Route::get('elite_challenge/step/1', 'PublicControllers\PagesController@showChallengeStep1');
    Route::post('elite_challenge/step/1', 'PublicControllers\PagesController@processChallengeStep1');

    Route::get('elite_challenge/step/2', 'PublicControllers\PagesController@showChallengeStep2');
    Route::post('elite_challenge/step/2', 'PublicControllers\PagesController@processChallengeStep2');

    Route::get('elite_challenge/step/3', 'PublicControllers\PagesController@showChallengeStep3');
    Route::post('elite_challenge/step/3', 'PublicControllers\PagesController@processChallengeStep3');
//});
Route::post('check_purl', 'UserController@checkPurl');
Route::get('/clearPurlSession', 'PurlController@clearPurlSession');
Route::get('/{purl}', 'PurlController@setPurlSession');