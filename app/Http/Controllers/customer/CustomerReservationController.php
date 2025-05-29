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

    // 予約入力画面（空き状況付き）
    public function create()
    {
        // CarbonはDateTimeクラスを継承した日時を扱うクラス
        $startDate = Carbon::today();
        $endDate = $startDate->copy()->addDays(13);
        
        // for文で2週間の予約をできる日を一覧にしている
        $dates = collect();
        for ($date = $startDate->copy(); $date->lte($endDate); $date->addDay()) {
            $dates->push($date->format('Y-m-d'));
        }

        // 予約できる時間帯、人数
        $timeSlots = ['11:00', '12:00', '13:00', '14:00', '15:00', '16:00','17:00',];
        $maxPeoplePerSlot = 10;

        // 	予約状況を「◯(残り)」「✕」で記録
        $status = [];
        foreach ($timeSlots as $time) {
            foreach ($dates as $date) {
                $reserved = Reservation::where('reserved_date', $date)
                    ->where('reserved_time', $time)
                    ->sum('people');

                $remaining = $maxPeoplePerSlot - $reserved;
                $status[$time][$date] = $remaining > 0 ? "◯({$remaining})" : '✕';
            }
        }

        return view('customer.reservations.create', compact('dates', 'timeSlots', 'status'));
    }

    // 予約登録処理
    public function store(StoreReservationRequest $request)
    {
        $request->validate([
            'name' => 'required|string',
            'name_kana' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'reserved_date' => [
                'required', 'date',
                'after_or_equal:' . now()->toDateString(),
                'before_or_equal:' . now()->addDays(13)->toDateString(),
            ],
            'reserved_time' => ['required', 'in:11:00,12:00,13:00,14:00,15:00,16:00,17:00'],
            'people' => 'required|integer|min:1|max:10',
            'body' => 'nullable|string|max:255',
        ]);

        $total = Reservation::where('reserved_date', $request->reserved_date)
            ->where('reserved_time', $request->reserved_time)
            ->sum('people');

        if ($total + $request->people > 10) {
            return back()->withErrors(['people' => 'この時間は定員に達しています。別の時間を選んでください。']);
        }

        $reservation = Reservation::create($request->all());

        // セッションに保存して thanks ページで使う
        return redirect()->route('customer.reservations.thanks')->with('reservation', $reservation)->with('message', '予約が完了しました！');
    }
}
