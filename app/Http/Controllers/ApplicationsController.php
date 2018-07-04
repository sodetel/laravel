<?php

namespace App\Http\Controllers;

use Validator;
use Exception;
use App\Application;
use Illuminate\Http\Request;

class ApplicationsController extends Controller
{
    function index() {

        $applications = Application::all();

        return view('applications.index', [
            'applications' => $applications
        ]);

    }

    function details(Application $application) {

        $this->authorize('view', $application);

        return view('applications.details', [
            'application' => $application
        ]);

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

        $application = new Application();

        // check https://laravel.com/docs/5.6/validation#available-validation-rules

        // if(stripos(request()->input('description'), 'pornographic') !== -1) {
        //     throw new Exception('Invalid');
        // }

        // 1) simpler one
        $this->validate(request(), [
            'price' => 'required|numeric|min:100',
            'description' => 'required|min:1|notContains:person,phone,provider'
        ]);

        // 2) shorter approach
        // $validator = Validator::make(request()->input(), [
        //     'price' => 'required|numeric|min:100',
        //     'description' => 'nullable|min:10'
        // ])->validate();

        // 3) custom approach, most flexible
        // $validator = Validator::make(request()->input(), [
        //     'price' => 'required|numeric|min:100',
        //     'description' => 'nullable|min:10'
        // ])
        // if($validator->fails()) {
        //     return redirect('/applications/create')
        //         ->withErrors($validator)
        //         ->withInput()
        //         ;
        // }

        if(request()->user()->email !== 'jessica@sodetel.com.lb') {
            return response('Unauthorized', 403);
        }

        // validate applicant_id

        if(!\App\Applicant::where('id', request()->applicant_id)->exists())
        {
            throw new Exception("Invalid applicant");
        }

        if(!\App\Service::where('id', request()->service_id)->exists())
        {
            throw new Exception("Invalid service");
        }

        if(!\App\Plan::where('id', request()->plan_id)->exists())
        {
            throw new Exception("Invalid plan");
        }

        // get all inputs
        // request()->all();

        // get only service and plan
        // request()->only(['service_id', 'plan_id']);

        // get all except service and plan
        // request()->except(['service_id', 'plan_id']);

        // $application->applicant_id = request()->applicant_id;
        $application->branch = request()->user()->branch;
        $application->applicant_id = request()->input('applicant_id');
        $application->service_id = request()->input('service_id');
        $application->plan_id = request()->input('plan_id');

        // $application->status = request()->input('status');
        $application->status = request()->input('status', 'pending');
        $application->date = request()->input('date', date('Y-m-d'));
        $application->price = request()->input('price');
        $application->description = request()->input('description');

        $application->save();

        return redirect('/applications')->with('message', 'Application created');
    }
}
