@extends('customer/layouts.default')

@section('content')
<script src="/js/customer/reservations.js" defer></script>
<link rel="stylesheet" href="/css/customer/reservations.css">
<form action="{{ route('customer.reservations.store') }}" method="POST">
    @csrf
    <div>
        <ul>
    <div class="container">
        <h2 class="mb-4">予約状況（{{ \Carbon\Carbon::today()->format('n/j') }}〜）</h2>

        <div class="table-responsive">
            <table class="table table-bordered text-center">
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
    
        <div class="form">
            <label for="name">お名前<span class="must">必須</span></label>
            <input type="text"  id="name" name="name" class="@error('name') border-red-500 @enderror" value="{{ old('name') }}">
            <p id="errorMessageName" class="error"></p>
        </div>
        @error('name')
        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror

        <div class="form">
            <label for="name_kana">お名前（カナ）<span class="must">必須</span></label>
            <input type="text"  id="name_kana" name="name_kana" class="@error('name_kana') border-red-500 @enderror" value="{{ old('name_kana') }}">
            <p id="errorMessageNameKana" class="error"></p>
        </div>
        @error('name_kana')
        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror

        <div class="form">
            <label for="email">メールアドレス<span class="must">必須</span></label>
            <input type="email"  id="email" name="email" class="@error('email') border-red-500 @enderror" value="{{ old('email') }}">
            <p id="errorMessageEmail" class="error"></p>
        </div>
        @error('email')
        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror

        <div class="form">
            <label for="phone">電話番号<span class="must">必須</span></label>
            <input type="text"  id="phone" name="phone" class="@error('phone') border-red-500 @enderror" value="{{ old('phone') }}">
            <p id="errorMessagePhone" class="error"></p>
        </div>
        @error('phone')
        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror

        <div class="form">
            <label for="time">ご予約人数<span class="must">必須</span></label>
            <input type="number" id="people" name="people" min="1" max="10" class="@error('people') border-red-500 @enderror" value="{{ old('people') }}">
            <p id="errorMessagePeople" class="error"></p>
        </div>
        @error('people')
        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror

        <div class="mb-3">
            <label for="reserved_date" class="form-label">予約日<span class="must">必須</span></label>
            <input type="date" name="reserved_date" id="reserved_date" class="@error('reserved_date') border-red-500 @enderror"
                   value="{{ old('reserved_date') }}" 
                   min="{{ \Carbon\Carbon::today()->toDateString() }}"
                   max="{{ \Carbon\Carbon::today()->addDays(13)->toDateString() }}" required>
        </div>
        <p id="errorMessageDate" class="error"></p>
        @error('reserved_date')
        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror

        <div class="mb-3">
            <label for="reserved_time" class="form-label">予約時間<span class="must">必須</span></label>
            <select name="reserved_time" id="reserved_time" class="@error('reserved_time') border-red-500 @enderror" required>
                <option value="">選択してください</option>
                @foreach (['11:00','12:00','13:00','14:00','15:00','16:00','17:00'] as $time)
                    <option value="{{ $time }}" {{ old('reserved_time') == $time ? 'selected' : '' }}>
                        {{ $time }}〜{{ \Carbon\Carbon::createFromTimeString($time)->addHour()->format('H:i') }}
                    </option>
                @endforeach
            </select>
        </div>
        <p id="errorMessageTime" class="error"></p>
        @error('reserved_time')
        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror

        <div class="form">
            <label for="body">ご要望<span class="any">任意</span></label>
            <textarea id="body" name="body">{{ old('body') }}</textarea>
        </div>
        <div>
            <button type="submit" id="btn" class="btn">予約する</button>
        </div>
    </div>
</form>
@endsection