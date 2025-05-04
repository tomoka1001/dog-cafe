<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminReservationController extends Controller
{
    public function index()
    {
        return view('/admin/reservation/reservation_index');
    }

    public function create()
    {
        return view('/admin/reservation/reservation_create');
    }

    public function update()
    {
        return view('/admin/reservation/reservation_update');
    }
}
