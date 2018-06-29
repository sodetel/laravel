<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApplicationsController extends Controller
{
    function index() {
        $applications = \App\Application::all();
        return view('applications.index', ['applications' => $applications]);
    }
}
