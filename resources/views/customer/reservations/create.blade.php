@extends('customer/layouts.default')

@section('content')
<script>
    const reservationStatus = @json($status); // 先にグローバル変数として定義
</script>
<script src="/js/customer/reservations.js" defer></script>
<link rel="stylesheet" href="{{ asset('css/customer/reservation.css') }}">
<form action="{{ route('customer.reservations.store') }}" method="POST">
    @csrf

    <section>
        <div class="main">
            <p><a href="/customer/index">トップ</a>＞ご予約</p>
            <h1>予約空き状況（{{ \Carbon\Carbon::today()->format('n/j') }}〜）</h1>
            <div>
                <table>
                    <thead>
                        <tr>
                            <th>時間</th>
                            @foreach ($dates as $date)
                            <th>{{ \Carbon\Carbon::parse($date)->format('n/j (D)') }}</th>
                            @endforeach
                        </tr>
                    </thead>
                
                    <tbody>
                    @foreach ($timeSlots as $time)
                        <tr>
                            <td><strong>{{ $time }}</strong></td>
                            @foreach ($dates as $date)
                            <td>
                                {{ $status[$time][$date] }}
                            </td>
                            @endforeach
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="form-group">
            <label for="name">お名前<span>必須</span></label>
            <input type="text"  id="name" name="name" value="{{ old('name') }}">
            <p id="errorMessageName"></p>
        </div>
        @error('name')
        <div class="error">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label for="name_kana">お名前（カナ）<span class="must">必須</span></label>
            <input type="text"  id="name_kana" name="name_kana" value="{{ old('name_kana') }}">
            <p id="errorMessageNameKana"></p>
        </div>
        @error('name_kana')
        <div class="error">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label for="email">メールアドレス<span>必須</span></label>
            <input type="email"  id="email" name="email" value="{{ old('email') }}">
            <p id="errorMessageEmail"></p>
        </div>
        @error('email')
        <div class="error">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label for="phone">電話番号<span>必須</span></label>
            <input type="text"  id="phone" name="phone" value="{{ old('phone') }}">
            <p id="errorMessagePhone" ></p>
        </div>
        @error('phone')
        <div class="error">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label for="time">ご予約人数<span class="must">必須</span></label>
            <input type="number" id="people" name="people" min="1" max="10" value="{{ old('people') }}">
            <p id="errorMessagePeople"></p>
        </div>
        @error('people')
        <div class="error">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label for="reserved_date">予約日<span>必須</span></label>
            <input type="date" name="reserved_date" id="reserved_date"
                   value="{{ old('reserved_date') }}" 
                   min="{{ \Carbon\Carbon::today()->toDateString() }}"
                   max="{{ \Carbon\Carbon::today()->addDays(13)->toDateString() }}" required>
        </div>
        <p id="errorMessageDate"></p>
        @error('reserved_date')
        <div class="error">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label for="reserved_time">予約時間<span>必須</span></label>
            <select name="reserved_time" id="reserved_time" required>
                <option value="">選択してください</option>
                @foreach (['11:00','12:00','13:00','14:00','15:00','16:00','17:00'] as $time)
                    <option value="{{ $time }}" {{ old('reserved_time') == $time ? 'selected' : '' }}>
                        {{ $time }}〜{{ \Carbon\Carbon::createFromTimeString($time)->addHour()->format('H:i') }}
                    </option>
                @endforeach
            </select>
        </div>
        <p id="errorMessageTime"></p>
        @error('reserved_time')
        <div class="error">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label for="body">ご要望<span>任意</span></label>
            <textarea id="body" name="body">{{ old('body') }}</textarea>
        </div>
        <div>
            <button type="submit" id="btn">予約する</button>
        </div>
    </div>
</form>
@endsection