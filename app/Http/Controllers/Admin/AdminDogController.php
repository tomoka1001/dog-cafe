<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Dog;

class AdminDogController extends Controller
{
    // 犬管理一覧表
    public function index()
    {
        $dogs = Dog::all();
        return view('/admin/dog/dog_index', ['dogs' => $dogs]);
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
