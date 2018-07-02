<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlansController extends Controller
{

    public function __construct() {

        $this->middleware('auth');

    }

    function index() {

        $plans = \App\Plan::all();

        $totalBalance = 500000011;

        $plan->created_by = request()->user()->email;

        if(Auth::check()) {
            // user logged in
        } else {
            // user not logged in
        }

        if(Auth::guest()) {
            // user not logged in
        } else {

            // user logged in
        }



        // load this resources/views/plans/index.blade.php
        return view('plans.index', [
            'plans' => $plans,
            'totalBalance' => $totalBalance,
        ]);
    }

    function details($id)
    {
        $plan = \App\Plan::find($id);

        return view('plans.details', [
            'plan' => $plan,
        ]);
    }

    function applications($id)
    {
        $plan = \App\Plan::with('applications')->find($id);

        return view('plans.applications', [
            'plan' => $plan,
        ]);
    }
}
