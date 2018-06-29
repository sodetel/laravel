<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    function index() {
        $menu = \App\Menu::all();
        return view('menu.index', ['menu' => $menu]);
    }
}
