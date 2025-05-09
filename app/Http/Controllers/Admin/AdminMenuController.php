<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminMenuController extends Controller
{
    public function index()
    {
        return view('admin.menus.index');
    }

    public function create()
    {
        return view('admin.menus.create');
    }

    public function update()
    {
        return view('admin.menus.edit');
    }
}
