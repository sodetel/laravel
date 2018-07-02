<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApplicationsController extends Controller
{
    function index() {
        $applications = \App\Application::all();
        return view('applications.index', ['applications' => $applications]);
    }

    function showCreate() {

        $applicants = \App\Applicant::all();
        $services = \App\Service::all();
        $plans = \App\Plan::all();
        $statuses = ['pending', 'completed', 'cancelled'];

        return view('applications.create', [
            'applicants' => $applicants,
            'services' => $services,
            'plans' => $plans,
            'statuses' => $statuses,
        ]);

    }

    function create() {

        $application = new \App\Application();

        // validate applicant_id

        if(!\App\Applicant::where('id', request()->applicant_id)->exists())
        {
            throw new \Exception("Invalid applicant");
        }

        if(!\App\Service::where('id', request()->service_id)->exists())
        {
            throw new \Exception("Invalid service");
        }

        if(!\App\Plan::where('id', request()->plan_id)->exists())
        {
            throw new \Exception("Invalid plan");
        }

        // get all inputs
        // request()->all();

        // get only service and plan
        // request()->only(['service_id', 'plan_id']);

        // get all except service and plan
        // request()->except(['service_id', 'plan_id']);

        // $application->applicant_id = request()->applicant_id;
        $application->applicant_id = request()->input('applicant_id');
        $application->service_id = request()->input('service_id');
        $application->plan_id = request()->input('plan_id');

        // $application->status = request()->input('status');
        $application->status = request()->input('status', 'pending');
        $application->date = request()->input('date', date('Y-m-d'));
        $application->price = request()->input('price');
        $application->description = request()->input('description');


        try {
            $application->save();
            return redirect('/applications')->with('message', 'Application created');
        } catch(\Exception $ex) {
            return redirect('/applications')->with('saveerror', 'Failed to save the application');
        }




    }
}
