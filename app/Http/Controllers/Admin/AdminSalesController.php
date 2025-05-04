<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminSalesController extends Controller
{
    public function index()
    {
        return view('/admin/sales/sales_index');
    }

    public function create()
    {
        return view('/admin/sales/sales_create');
    }

    public function update()
    {
        return view('/admin/sales/sales_update');
    }
}
