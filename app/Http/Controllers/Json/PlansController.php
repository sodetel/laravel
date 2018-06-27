<?php
namespace App\Http\Controllers\Json;

use Illuminate\Http\Request;

class PlansController extends \App\Http\Controllers\Controller
{
    function all() {

        $country = request()->get('country');
        $orderBy = request()->get('order');

        // query() is optional since we are using with method after it
        // $query = \App\Plan::with('applications');
        $query = \App\Plan::query()->with('applications');

        if($country)
        {
            $query = $query->where('country', $country);
        }

        if($orderBy)
        {
            $query = $query->orderBy($orderBy);
        }

        $plans = $query->get();

        return $plans;

    }

    function find(\App\Plan $plan)
    {
        $plan->load('applications');

        return $plan;
    }

    function store()
    {

        $plan = new \App\Plan();
        $plan->name = request()->get('name');
        $plan->country = request()->get('country');
        $plan->save();

        return ['status' => 'ok'];
    }

    function deleteAll()
    {

       $plans = \App\Plan::all();

        foreach($plans as $plan)
        {
            $plan->delete();
        }

        return [
            'status' => 'ok',
            'deleted' => count($plans),
        ];

    }

    function delete($id)
    {

       $plan = \App\Plan::find($id);

        $deleted = $plan->delete();

        return [
            'status' => 'ok',
            'deleted' => $deleted
        ];

    }
}
