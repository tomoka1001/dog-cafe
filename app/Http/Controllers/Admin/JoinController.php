<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JoinController extends Controller
{
    public function index()
    {
        return view('admin/join/join_index');
    }

    public function create()
    {
        return view('admin/join/join_check');
    }

    public function update()
    {
        return view('admin/join/join_thanks');
    }
}
