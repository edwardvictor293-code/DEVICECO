<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="DEVICECO routes selected for the way a bicycle is meant to feel.">
    <title>Routes | DEVICECO</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="content-page">
    <x-site-loader />
    <x-site-navigation />
    <main>
        <section class="content-hero content-hero-routes">
            <div class="content-hero-copy">
                <p class="eyebrow"><span></span> Routes / Find your line</p>
                <h1 class="display-v2">The road is<br><em>never just a road.</em></h1>
                <p>Routes selected for the way DEVICECO bicycles are meant to feel.</p>
            </div>
        </section>
        <section class="content-index section-cream">
            <div class="section-kicker">02 — Field notes</div>
            <div class="editorial-grid">
                @forelse($routes as $route)
                    <a class="editorial-card reveal" href="{{ route('routes.show', $route) }}" data-transition>
                        <div class="editorial-image" style="background-image:url('{{ $route->image_url }}')">
                            <span>{{ $route->location }} / {{ $route->difficulty }}</span>
                        </div>
                        <div class="editorial-card-copy"><h2>{{ $route->name }}</h2><p>{{ $route->distance }} km / {{ $route->elevation }} m elevation</p></div>
                    </a>
                @empty
                    <p class="empty-editorial">No routes published yet. The next line is still waiting to be drawn.</p>
                @endforelse
            </div>
        </section>
    </main>
    <x-site-footer />
</body>
</html>
