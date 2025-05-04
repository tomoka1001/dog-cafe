<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminShiftController extends Controller
{
    public function index()
    {
        return view('/admin/shift/shift_index');
    }

    public function create()
    {
        return view('/admin/shift/shift_create');
    }

    public function update()
    {
        return view('/admin/shift/shift_update');
    }
}
