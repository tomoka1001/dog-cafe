<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerReservationController extends Controller
{
    public function index()
    {
        return view('customer.reservations.index');
    }

    public function create()
    {
        return view('customer.reservations.create');
    }
}