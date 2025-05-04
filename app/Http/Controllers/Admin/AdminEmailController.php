<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminemailController extends Controller
{
    public function index()
    {
        return view('/admin/email/email_index');
    }

    public function create()
    {
        return view('/admin/email/email_create');
    }

    public function update()
    {
        return view('/admin/email/email_update');
    }
}
