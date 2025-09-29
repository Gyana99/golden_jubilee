<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Http;

class WhatsAppController extends Controller
{
    // Show the form
    public function index()
    {
        return view('whatsapp.form');
    }


    public function sendBulk(Request $request)
    {
        // ✅ Validate message
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        // ✅ Infobip credentials
        $apiKey   = "140c7683f8c85ae11f53981747812f99-5d896533-d0c6-4497-b1ee-f5e082c85139";
        $baseUrl  = "https://v3qrwp.api.infobip.com";
        $sender   = "447860088970"; // Your WhatsApp sender

        // ✅ Recipients (must be full international numbers with country code)
        $recipients = [
            "917205569189", // India example
            // add more numbers here...
        ];

        $responses = [];

        foreach ($recipients as $to) {
            $payload = [
                "messages" => [
                    [
                        "from"=> $sender,
                        "to" => $to,  // ✅ use $to, not hardcoded
                        "content" => [
                            "text" => $request->message
                        ],
                        "context" => [
                            "replyToMessageId" => '34CEEFE28DF2039C324F3153E8E61DE7'
                        ],
                        "callbackData" => "alumni-invite",
                    ]
                ]
            ];

            $response = Http::withHeaders([
                "Authorization" => "App {$apiKey}",
                "Content-Type"  => "application/json",
                "Accept"        => "application/json",
            ])->post("{$baseUrl}/whatsapp/1/message/text", $payload);

            $responses[] = $response->json();
        }

        // ✅ Debug
        dd($responses);

        // ✅ Return all responses as JSON
        return response()->json([
            "status" => "success",
            "sent_message" => $request->message,
            "infobip_responses" => $responses,
        ]);
    }
}
