<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><meta name="description" content="Your DEVICECO bicycle order request has been received."><title>Order received | DEVICECO</title>@vite(['resources/css/app.css', 'resources/js/app.js'])</head>
<body class="checkout-page">
    <x-site-loader /><x-site-navigation />
    <main class="confirmation-page"><p class="eyebrow"><span></span> DEVICECO / Request received</p><h1 class="display-v2">Your next<br><em>ride is in motion.</em></h1><p>We received your request for {{ $order->bicycle->name }}. Our team will contact you at {{ $order->email }} to confirm the build, availability, delivery timing, and payment options.</p><div class="confirmation-reference"><span>ORDER REQUEST</span><strong>DC-{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</strong></div><div><a class="button button-light" href="{{ route('bicycles.index') }}" data-transition>Return to collection <span>↗</span></a><a class="arrow-link light-link" href="{{ route('contact') }}" data-transition>Speak with DEVICECO <span>↗</span></a></div></main>
    <x-site-footer />
</body>
</html>
