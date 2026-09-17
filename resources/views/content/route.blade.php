<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $route->name }} cycling route by DEVICECO.">
    <title>{{ $route->name }} | DEVICECO</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="content-page">
    <x-site-loader /><x-site-navigation />
    <main>
        <section class="content-detail-hero" style="--content-image:url('{{ $route->image_url }}')">
            <div class="content-detail-copy"><p class="eyebrow"><span></span> {{ $route->location }} / {{ $route->difficulty }}</p><h1 class="display-v2">{{ $route->name }}</h1><p>{{ $route->description }}</p><div class="route-stats"><strong>{{ $route->distance }} <small>KM</small></strong><strong>{{ $route->elevation }} <small>M ELEVATION</small></strong><strong>{{ intdiv($route->duration_minutes, 60) }}H {{ $route->duration_minutes % 60 }}M <small>EST. DURATION</small></strong></div></div>
        </section>
        <section class="detail-statement section-cream"><div class="section-kicker">02 — Find your line</div><h2 class="display-v2">Leave room<br>for the<br><em>interesting turn.</em></h2><a class="button button-dark" href="{{ route('routes') }}" data-transition>Explore all routes <span>↗</span></a></section>
    </main>
    <x-site-footer />
</body>
</html>
