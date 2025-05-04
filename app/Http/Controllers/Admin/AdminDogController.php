<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminDogController extends Controller
{
    public function index()
    {
        return view('/admin/blog/blog_index');
    }

    public function create()
    {
        return view('/admin/blog/blog_index');
    }

    public function update()
    {
        return view('/admin/blog/blog_index');
    }
}
