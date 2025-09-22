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

    // Handle bulk send
    public function sendBulk(Request $request)
    {
        // ✅ Validate message
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        $sid       = env('TWILIO_SID');
        $authToken = env('TWILIO_AUTH_TOKEN');
        $from      = env('TWILIO_WHATSAPP_FROM');

        // ✅ Hardcoded recipients (or pull from DB)
        $recipients = [
            'whatsapp:+917205569189',
            'whatsapp:+919439099799',
            'whatsapp:+918260690401',
        ];

        $responses = [];

        foreach ($recipients as $to) {
            $response = Http::withBasicAuth($sid, $authToken)
                ->asForm()
                ->post("https://api.twilio.com/2010-04-01/Accounts/{$sid}/Messages.json", [
                    'To'   => $to,
                    'From' => $from,
                    'Body' => $request->message,
                ]);

            // Collect API response for each recipient
            $responses[] = $response->json();
        }
        dd($responses);
        // ✅ Return response as JSON instead of redirect
        return response()->json([
            'status' => 'success',
            'sent_message' => $request->message,
            'twilio_responses' => $responses,
        ]);
    }
}
