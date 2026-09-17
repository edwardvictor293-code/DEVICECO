<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><meta name="description" content="Complete your DEVICECO bicycle order request."><title>Checkout | DEVICECO</title>@vite(['resources/css/app.css', 'resources/js/app.js'])</head>
<body class="checkout-page">
    <x-site-loader /><x-site-navigation />
    <main class="checkout-layout">
        <section class="checkout-product" style="--checkout-image:url('{{ $bicycle->image_url }}')"><div><p class="eyebrow"><span></span> DEVICECO / Checkout</p><h1 class="display-v2">{{ $bicycle->name }}<br><em>{{ $bicycle->tagline }}</em></h1><p>{{ $bicycle->description }}</p><strong>${{ number_format($bicycle->price, 0) }} <small>USD</small></strong></div></section>
        <section class="checkout-form-wrap"><div class="section-kicker">02 — Delivery details</div><h2>Make it <em>yours.</em></h2><p class="checkout-note">Submit your order request and the DEVICECO team will confirm availability, fit, delivery timing, and payment options with you.</p>@if($errors->any())<div class="form-errors">Please check the highlighted fields and try again.</div>@endif<form method="POST" action="{{ route('checkout.store', $bicycle) }}" class="checkout-form">@csrf<label>Name<input name="name" value="{{ old('name', auth()->user()?->name) }}" required autocomplete="name">@error('name')<span>{{ $message }}</span>@enderror</label><label>Email<input name="email" type="email" value="{{ old('email', auth()->user()?->email) }}" required autocomplete="email">@error('email')<span>{{ $message }}</span>@enderror</label><label>Address<input name="address" value="{{ old('address') }}" required autocomplete="street-address">@error('address')<span>{{ $message }}</span>@enderror</label><div class="checkout-fields"><label>City<input name="city" value="{{ old('city') }}" required autocomplete="address-level2">@error('city')<span>{{ $message }}</span>@enderror</label><label>Postal code<input name="postal_code" value="{{ old('postal_code') }}" required autocomplete="postal-code">@error('postal_code')<span>{{ $message }}</span>@enderror</label></div><button class="button button-light" type="submit">Request this bicycle <span>↗</span></button></form></section>
    </main>
    <x-site-footer />
</body>
</html>
