<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

DB::listen(function($query) {
    Log::info($query->sql, $query->bindings);
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/output/string', function () {

    return '
        <html>
            <body>
                <h1>Sales Admin Section</h1>
                <hr>
                <small>Copyright &copy; ' . date('Y') . '</small>
            </body>
        </html>
    ';

});

Route::get('/output/view', function () {

    // /resources/views/output_view.blade.php
    return view('output_view');

});


Route::get('/plans', function () {

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

});

Route::get('/plans/{id}', function ($id) {

    $plan = \App\Plan::with('applications')->find($id);

    // update existing plan
    // $plan->name = $plan->name . ' updated';
    // $plan->save();

    return response()->json($plan);

});

Route::post('/plans', function() {

    $plan = new \App\Plan();
    $plan->name = request()->get('name');
    $plan->country = request()->get('country');
    $plan->save();

    return ['status' => 'ok'];

});

Route::delete('/plans', function () {

    $plans = \App\Plan::all();

    foreach($plans as $plan)
    {
        $plan->delete();
    }

    return [
        'status' => 'ok',
        'deleted' => count($plans),
    ];

});

Route::delete('/plans/{id}', function ($id) {

    $plan = \App\Plan::find($id);

    $deleted = $plan->delete();

    return [
        'status' => 'ok',
        'deleted' => $deleted
    ];

});

Route::get('/mafia😎', function () {
    DB::statement('create table mafia (id serial);');
    return 'table created';
});
