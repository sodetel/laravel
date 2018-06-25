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

