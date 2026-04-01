<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function checkout(Request $request)
    {
        // Exigimos que el botón envíe el ID del plan de Stripe
        $request->validate([
            'price_id' => 'required|string',
        ]);

        // Magia pura: Creamos la suscripción y redirigimos al checkout oficial
        return $request->user()
            ->newSubscription('default', $request->price_id)
            ->checkout([
                'success_url' => url('/dashboard?success=true'),
                'cancel_url' => url('/dashboard?canceled=true'),
            ]);
    }
}