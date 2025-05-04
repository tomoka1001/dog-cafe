<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminMenuController extends Controller
{
    public function index()
    {
        return view('/admin/menu/menu_index');
    }

    public function create()
    {
        return view('/admin/menu/menu_create');
    }

    public function update()
    {
        return view('/admin/menu/menu_update');
    }
}
