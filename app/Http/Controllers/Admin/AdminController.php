<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AdminController extends Controller
{
    // 管理者側画面
    public function index()
    {
        return view('/admin/index');
    }
    
}
