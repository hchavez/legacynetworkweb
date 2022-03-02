<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{

    public function index()
    {
        return view('legacy_admin.weekly_report');
    }

    public function showLegacyEventsPage()
    {
        return view('legacy_admin.legacy_events');
    }

    public function showSynergyPage()
    {
        return view('legacy_admin.synergy_achievement_requests');
    }

    public function showAdditoinalRequests()
    {
        return view('legacy_admin.synergy_additional_requests');
    }

    public function showSynergyEnrollmentPage()
    {
        return view('legacy_admin.synergy_enrollment');
    }

}
