<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreMenuRequest extends FormRequest
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
            'name' => 'required | max:255',
            'image' => 'required | file | image | mimes:jpeg,jpg,png',
            'price' => 'required | max:20000',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '名前は必須です。',
            'image.required' => '画像をアップロードしてください。',
            'image.image' => '画像ファイルを選択してください。',
            'image.mimes' => 'jpeg,jpg,pngの画像をアップロードしてください。',
            'price.required' => '価格は必須です。',
        ];
    }
}
