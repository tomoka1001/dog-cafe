<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class StoreReservationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'name_kana' => ['required', 'string', 'max:255', 'regex:/^[ァ-ヶー \s]+$/u'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['nullable', 'regex:/^0\d{1,4}-?\d{1,4}-?\d{4}$/'],
            'people' => ['required', 'integer', 'min:1', 'max:10'],

            // 予約日は「今日以降、2週間以内」
            'reserved_date' => [
            'required', 'date',
            'after_or_equal:' . now()->toDateString(),
            'before_or_equal:' . now()->addDays(13)->toDateString(),
            ],

            // 固定時間枠のみ許可（11:00〜16:00）
            'reserved_time' => [
            'required',
            'in:11:00,12:00,13:00,14:00,15:00,16:00',
            ],

            'body' => ['nullable', 'string', 'max:255'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'お名前を入力してください。',
            'name_kana.required' => 'お名前（カナ）を入力してください。',
            'email.required' => '正しいメールアドレスを入力してください。',
            'phone.required' => '正しい電話番号を入力してください。',
            'people.required' => 'ご予約人数を入力してください。',
            'reserved_date' => 'ご予約日を入力してください',
            'reserved_time' => 'ご予約時時を入力してください',
        ];
        // if (!email) errors.push("メールアドレスを入力してください");
        // if (!phone) errors.push("電話番号を入力してください");
        // if (!password) errors.push("パスワードを入力してください");
        // if (!confirmPassword) errors.push("パスワード（確認）を入力してください");
        // if (password && confirmPassword && password !== confirmPassword) errors.push("パスワードが一致しません");
    }
}
