<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Contact DEVICECO for fit guidance, product questions, or a conversation about your next ride.">
    <title>Contact | DEVICECO</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="contact-page">
    <x-site-loader /><x-site-navigation />
    <main>
        <section class="contact-layout">
            <div class="contact-image" aria-hidden="true"></div>
            <div class="contact-copy"><p class="eyebrow"><span></span> Contact / Start a conversation</p><h1 class="display-v2">Tell us where<br>you are <em>going.</em></h1><p>For fit guidance, product questions, or a conversation about the next ride, reach out to our team.</p>@if(session('status'))<p class="status-message">{{ session('status') }}</p>@endif<form method="POST" action="{{ route('contact.store') }}" class="contact-form">@csrf<label>Name<input name="name" value="{{ old('name') }}" required autocomplete="name"></label><label>Email<input name="email" type="email" value="{{ old('email') }}" required autocomplete="email"></label><label>Subject<input name="subject" value="{{ old('subject') }}" required></label><label>Message<textarea name="message" required rows="5">{{ old('message') }}</textarea></label><button class="button button-light" type="submit">Send message <span>↗</span></button></form></div>
        </section>
    </main>
    <x-site-footer />
</body>
</html>
