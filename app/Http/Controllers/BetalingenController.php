<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mollie\Laravel\Facades\Mollie;
use App\Models\Boeking;
use Mollie\Api\MollieApiClient;


class BetalingenController extends Controller
{
    /**
     * Start de betaling bij Mollie
     */
    public function startPayment(Boeking $boeking)
    {
        $payment = Mollie::api()->payments->create([
            'amount' => [
                'currency' => 'EUR',
                'value' => number_format($boeking->prijs, 2, '.', ''),
            ],
            'description' => "Boeking #{$boeking->id}",
            /*'redirectUrl' => route('betalingen.callback', $boeking),
            'webhookUrl' => route('betalingen.webhook'),*/
            'redirectUrl' => route('betalingen.callback', $boeking),
            'webhookUrl' => env('MOLLIE_WEBHOOK'),
            'metadata' => [
                'boeking_id' => $boeking->id,
            ],
        ]);

        $boeking->mollie_id = $payment->id;
        $boeking->save();

        return redirect($payment->getCheckoutUrl(), 303);
    }

    /**
     * Callback na betaling (user komt terug via redirect)
     */
    public function handleCallback(Boeking $boeking)
    {
        $payment = Mollie::api()->payments->get($boeking->mollie_id);

        if ($payment->isPaid()) {
            $boeking->voldaan = true;
            $boeking->save();

            return view('klantenboekingsucces')->with('success', 'Je betaling is geslaagd. Veel plezier met vissen!');
        } else {
            return redirect()->route('boeken.index')->withErrors('De betaling is niet gelukt of geannuleerd.');
        }
    }

    /**
     * Webhook voor Mollie (asynchroon)
     */
    public function handleWebhook(Request $request)
    {
        $paymentId = $request->input('id');
        if (!$paymentId) {
            return response()->json(['error' => 'Payment ID ontbreekt'], 400);
        }

        $payment = Mollie::api()->payments->get($paymentId);

        $boekingId = $payment->metadata->boeking_id ?? null;
        $boeking = Boeking::find($boekingId);

        if (!$boeking) {
            return response()->json(['error' => 'Boeking niet gevonden'], 404);
        }

        if ($payment->isPaid() && !$boeking->voldaan) {
            $boeking->voldaan = true;
            $boeking->save();
        }

        return response()->json(['status' => 'ok']);
    }
}
