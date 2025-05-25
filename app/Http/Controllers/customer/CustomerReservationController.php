<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Customer\StoreReservationRequest;
use Carbon\Carbon;
use App\Models\Reservation;


class CustomerReservationController extends Controller
{
    public function index()
    {
        $reservation = session('reservation');
        return view('customer.reservations.thanks', compact('reservation'));
    }

    // 予約入力画面
    public function create()
    {
        return view('customer.reservations.create');
    }

    // 予約登録処理
    public function store(StoreReservationRequest $request)
    {
        $validated = $request->validated();

        $reservation  = Reservation::create($validated);

        return redirect()->route('customer.reservations.thanks')->with('reservation', $reservation)->with('message', '予約を受け付けました');
    }
}