<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Http;
use App\Models\EmailLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminemailController extends Controller
{
    public function index()
    {
        return view('/admin/email/email_index');
    }

    public function create()
    {
        return view('/admin/email/email_create');
    }

    public function update()
    {
        return view('/admin/email/email_update');
    }

    public function import()
    {
        $response = Http::get('http://mailpit:8025/api/v1/messages');

        if (!$response->ok()) {
            return response()->json(['error' => 'Mailpit に接続できませんでした'], 500);
        }

        $messages = $response->json()['messages'];

        foreach ($messages as $message) {
            $id = $message['ID'];
            $detail = Http::get("http://mailpit:8025/api/v1/message/{$id}")->json();

            $from = $detail['from']['address'] ?? '';
            $body = $detail['text'] ?? $detail['html'] ?? '';
            $subject = $detail['subject'] ?? '';

            // ここで body からデータを抽出する（名前など）
            // 例: 本文に "名前：山田 太郎" という形式で含まれていると想定
            $name = $this->extractField($body, '名前');
            $name_kana = $this->extractField($body, 'ふりがな');
            $email = $this->extractField($body, 'メールアドレス');
            $phone = $this->extractField($body, '電話番号');
            $inquiry = $this->extractField($body, '内容');

            if (!empty($email) && !EmailLog::where('email', $email)->where('body', $inquiry)->exists()) {
                EmailLog::create([
                    'name' => $name,
                    'name_kana' => $name_kana,
                    'email' => $email,
                    'phone' => $phone,
                    'body' => $inquiry,
                ]);
            }
        }

        return response()->json(['message' => 'メールインポート完了']);
    }

    private function extractField(string $text, string $label): ?string
    {
        $pattern = '/' . preg_quote($label, '/') . '：(.+?)\r?\n/';
        if (preg_match($pattern, $text, $matches)) {
            return trim($matches[1]);
        }
        return null;
    }
}
