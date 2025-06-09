<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogRequest extends FormRequest
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
    public function rules()
    {
        return [
            'title' => 'required | max:255',
            'image' => 'required | file | image | mimes:jpeg,jpg,png',
            'body' => 'required | max:20000',
            'staff_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'タイトルは必須です。',
            'image.required' => '画像をアップロードしてください。',
            'image.image' => '画像ファイルを選択してください。',
            'image.mimes' => 'jpeg,jpg,pngの画像をアップロードしてください。',
            'body.required' => '本文は必須です。',
        ];
    }
}

