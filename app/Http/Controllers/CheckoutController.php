<?php

namespace App\Http\Controllers;

use App\Models\BikeOrder;
use App\Models\Bicycle;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CheckoutController extends Controller
{
    public function create(Bicycle $bicycle): View
    {
        return view('checkout', compact('bicycle'));
    }

    public function store(Request $request, Bicycle $bicycle): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:160'],
            'address' => ['required', 'string', 'max:220'],
            'city' => ['required', 'string', 'max:100'],
            'postal_code' => ['required', 'string', 'max:30'],
        ]);

        $order = BikeOrder::create([
            ...$validated,
            'user_id' => $request->user()?->id,
            'bicycle_id' => $bicycle->id,
            'total_price' => $bicycle->price,
            'status' => 'request_received',
        ]);

        return redirect()->route('checkout.confirmation', $order)->with('status', 'Your DEVICECO order request has been received.');
    }

    public function confirmation(BikeOrder $order): View
    {
        return view('checkout-confirmation', compact('order'));
    }
}
