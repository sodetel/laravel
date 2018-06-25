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

    // $plans = DB::select('select * from plans where country = ? order by ?', [$country, $orderBy]);

    $query = DB::table('plans'); //->where('is_active');

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

    // $plan = DB::select('select * from plans where id = ? limit 1', [ $id ]);

    // calling stored procedure
    // $plan = DB::select('call getPlanById (?)', [ $id ]);
    // $deleted = DB::delete('call deletePlanById(?)', [$id]);

    $plan = DB::table('plans')->where('id', $id)->first();

    return response()->json($plan);

});

Route::post('/plans', function() {

    $plan = [
        'name' => request()->get('name'),
        'country' => request()->get('country'),
        'created_at' => date('Y-m-d'),
        'updated_at' => date('Y-m-d'),
    ];

    // $values = [$name , date('Y-m-d'), date('Y-m-d')];

    // DB::insert('insert into `plans`(name, created_at, updated_at) values(?, ?, ?)', $values);

    DB::table('plans')->insert($plan);

    return ['status' => 'ok'];

});

Route::delete('/plans', function () {

    // $deleted = DB::delete('delete from plans');

    $deleted = DB::table('plans')->delete();

    return [
        'status' => 'ok',
        'deleted' => $deleted
    ];

});

Route::delete('/plans/{id}', function ($id) {

    // $deleted = DB::delete('delete from plans where id = ?', [$id]);
    // here we are using the named parameters, it helps when we have complex
    // query with many parameters, so the order is not important
    // $deleted = DB::delete('delete from plans where id = :id', ['id' => $id]);

    $deleted = DB::table('plans')->where('id', $id)->delete();

    return [
        'status' => 'ok',
        'deleted' => $deleted
    ];

});

Route::get('/mafia😎', function () {
    DB::statement('create table mafia (id serial);');
    return 'table created';
});
