<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

// app/Console/Commands/FetchMailpitEmails.php

use Illuminate\Support\Facades\Http;
use App\Models\Email;

class FetchMailpitEmails extends Command
{
    protected $signature = 'mailpit:fetch';
    protected $description = 'Fetch emails from Mailpit and store in database';

    public function handle()
    {
        $response = Http::get('http://localhost:8025/api/v1/messages');

        foreach ($response['messages'] as $message) {
            $id = $message['ID'];
            $details = Http::get("http://localhost:8025/api/v1/message/{$id}");

            Email::updateOrCreate(
                ['message_id' => $id],
                [
                    'message_id' => $id,
                    'subject' => $details['Subject'] ?? null,
                    'from_email' => $details['From'][0]['Address'] ?? null,
                    'to_email' => $details['To'][0]['Address'] ?? null,
                    'body' => $details['Text'] ?? $details['HTML'] ?? null,
                ]
            );
            
        }

        $this->info('Emails fetched and stored.');
    }
}
