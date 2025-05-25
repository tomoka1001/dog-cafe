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
            'name_kana' => ['required', 'string', 'max:255', 'regex:/^[ァ-ロワンヴー]*$/u'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['nullable', 'regex:/^0(\d-?\d{4}|\d{2}-?\d{3}|\d{3}-?\d{2}|\d{4}-?\d|\d0-?\d{4})-?\d{4}$/'],
            'people' => ['required','integer','min:1','max:10'],
            'reserved_at' => ['required','date','after:now'],
            'body' => ['required', 'string', 'max:255'],
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
            'reserved_at' => 'ご予約日時を入力してください',
        ];
        // if (!email) errors.push("メールアドレスを入力してください");
        // if (!phone) errors.push("電話番号を入力してください");
        // if (!password) errors.push("パスワードを入力してください");
        // if (!confirmPassword) errors.push("パスワード（確認）を入力してください");
        // if (password && confirmPassword && password !== confirmPassword) errors.push("パスワードが一致しません");
    }
}
