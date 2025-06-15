<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminSettingController extends Controller
{
    public function index()
    {
        return view('/admin/setting/setting_index');
    }

    public function create()
    {
        return view('/admin/setting/setting_create');
    }

    public function update()
    {
        return view('/admin/setting/setting_update');
    }
}
