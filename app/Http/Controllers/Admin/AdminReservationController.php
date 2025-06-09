<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Reservation;

class AdminReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();
        return view('admin.reservations.index', compact('reservations'));
    }

    public function show(string $id)
    {
        $reservation = Reservation::findOrFail($id);
        return view('admin.reservations.show', compact('reservation'));
    }
}
