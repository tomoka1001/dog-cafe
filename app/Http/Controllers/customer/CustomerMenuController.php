<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;

class CustomerMenuController extends Controller
{
    public function index() 
    {
        $menus = Menu::all();
        // compact('menus')は['menus' => $menus]と同じ
        return view('customer.menus.index', compact('menus'));
    }
}
