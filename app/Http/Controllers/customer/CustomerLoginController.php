<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerLoginController extends Controller
{
    // ユーザー登録画面の表示
    public function create()
    {
        return view('customer.login.create');
    }
}
