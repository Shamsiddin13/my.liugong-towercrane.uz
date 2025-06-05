<?php

namespace App\Http\Controllers;

use App\Models\Landing;
use App\Models\LandingPost;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LandingController extends Controller
{
    protected $telegramChannelId = '-1002638604200';

    protected $telegramDataFetcherBotToken = '7405931616:AAGGeHTBpUkqxZmTqbHCPJm5_OjjwdcDBAM';

    public function show($link)
    {
        // Initialize variables
        $landing = null;
        $landingPost = null;
        $product = null;

        // Attempt to fetch landing details from the Landing table
        $landing = Landing::query()->where('sku', $link)->first();

        $product = $landing->product ?? null;

        if (!$landing) {
            // If not found in Landing, check the Stream table
            $landingPost = LandingPost::query()->where('unique_link', $link)->first();

            if ($landingPost) {
                // Fetch the associated landing from the stream
                $landing = $landingPost->landing;
                $product = $landing->product ?? null;
                $user = User::query()->where('id', $landingPost->user_id)->first();
            }
        }

        if (!$landing) {
            $landing = Landing::query()->where('sku', $link)->first();
            $product = $landing->product();
        }

        // If landing is still not found, abort with a 404 error
        if (!$landing) {
            abort(404, 'Landing page not found.');
        }

        // Pass all necessary data to the view
        return view('landing.landing', compact('landing', 'product', 'landingPost'));
    }

    public function submitForm(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|min:6|max:20',
            'region' => 'required|string|max:100',
            'pixel_id'  => 'nullable|string',
        ]);

        $pixel_id  = $validated['pixel_id'] ?? '';

        $now = now()->addHours(5)->format('d_m_Y');
        $nowTime = now()->addHours(5)->format('d-m-Y H:i:s');

        $formattedPhone = str_replace(['(', ')', '-', '+', ' '], '', $validated['phone']);

        $text = "<blockquote><b>🆕 Yangi buyurtma</b></blockquote>\n\n";
        $text .= "👤 <b>Ismi:</b> <b>{$validated['name']}</b>\n";
        $text .= "📞 <b>Telefon Raqami:</b> <code>+{$formattedPhone}</code> \n";
        $text .= "📍 <b>Viloyat:</b> <b>{$validated['region']}</b>\n";
        $text .= "📅 <b>Buyurtma Sana:</b> #sana_{$now}\n\n";
        $text .= "🕒 <b>Buyurtma Vaqti:</b> {$nowTime}\n\n";

        $this->sendMessageToTelegram($text, $this->telegramChannelId);

        // Redirect to the thank you page with the pixel_id
        return redirect()->route('landing.thanks', ['pixel_id' => $pixel_id]);
    }

    public function thanks(Request $request)
    {
        // Redirect to the thank you page with the pixel_id
        $pixel_id = $request->input('pixel_id', '');
        return view('landing.thanks', compact('pixel_id'));
    }

    public function sendMessageToTelegram($text, $chatId)
    {
        $client = new \GuzzleHttp\Client();

        $url = "https://api.telegram.org/bot{$this->telegramDataFetcherBotToken}/sendMessage";

        // ✅ Skip empty or null chat IDs
        if (empty($chatId)) {
            Log::warning('Skipped empty chat_id');
        }

        try {
            $response = $client->post($url, [
                'form_params' => [
                    'chat_id'    => $chatId,
                    'text'       => $text,
                    'parse_mode' => 'HTML',
                ]
            ]);

            $body = json_decode($response->getBody()->getContents(), true);

            if (!isset($body['ok']) || $body['ok'] !== true) {
                Log::error("Telegram message failed to send to {$chatId}", $body);
            }

        } catch (\Exception $e) {
            Log::error("Telegram API error for chat_id {$chatId}: " . $e->getMessage());
        }
    }

}
