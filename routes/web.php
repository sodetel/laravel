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

    $plans = DB::select('select * from plans');

    return $plans;

});

Route::get('/plans/{id}', function ($id) {

    $plan = DB::select('select * from plans where id = ? limit 1', [ $id ]);

    return $plan;

});

Route::post('/plans', function() {

    // $plan = [
    //     'name' => 'Super Ultimate',
    //     'created_at' => date('Y-m-d'),
    //     'updated_at' => date('Y-m-d'),
    // ];

    $name = request()->get('name');

    $values = [$name , date('Y-m-d'), date('Y-m-d')];

    DB::insert('insert into `plans`(name, created_at, updated_at) values(?, ?, ?)', $values);

    return ['status' => 'ok'];

});

Route::delete('/plans', function () {

    $deleted = DB::delete('delete from plans');

    return [
        'status' => 'ok',
        'deleted' => $deleted
    ];

});

Route::delete('/plans/{id}', function ($id) {

    // $deleted = DB::delete('delete from plans where id = ?', [$id]);
    // here we are using the named parameters, it helps when we have complex
    // query with many parameters, so the order is not important
    $deleted = DB::delete('delete from plans where id = :id', ['id' => $id]);

    return [
        'status' => 'ok',
        'deleted' => $deleted
    ];

});

Route::get('/mafia😎', function () {
    DB::statement('create table mafia (id serial);');
    return 'table created';
});
