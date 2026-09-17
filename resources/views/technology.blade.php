<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Explore the frame, control, and systems thinking behind DEVICECO bicycles.">
    <title>Technology | DEVICECO</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="technology-page">
    <x-site-loader />
    <x-site-navigation />
    <main>
        <section class="technology-hero">
            <video class="technology-hero-video" autoplay muted loop playsinline preload="metadata" poster="{{ asset('videos/deviceco-engineering-poster.jpg') }}" aria-hidden="true">
                @if(file_exists(public_path('videos/deviceco-engineering.mp4')))<source src="{{ asset('videos/deviceco-engineering.mp4') }}" type="video/mp4">@endif
            </video>
            <div class="technology-hero-media" aria-hidden="true"></div>
            <div class="technology-hero-copy">
                <p class="eyebrow"><span></span> DEVICECO / System study</p>
                <h1 class="display-v2">The quiet<br><em>advantage.</em></h1>
                <p>Engineering that disappears beneath the ride, leaving only control, momentum, and more road ahead.</p>
                <a class="button button-light" href="{{ route('bicycles.index') }}" data-transition>Explore the collection <span>↗</span></a>
            </div>
            <div class="technology-index">01 / 05</div>
        </section>
        <section class="technology-intro section-cream">
            <div class="section-kicker">02 — Designed as one</div>
            <div class="technology-intro-grid">
                <h2 class="display-v2 reveal">Every part<br>answers the<br><em>whole.</em></h2>
                <p class="technology-lede reveal">A DEVICECO bicycle is not a frame with components attached. It is one considered system: frame, contact points, braking, shifting, and the space between each decision.</p>
            </div>
        </section>
        <section class="technology-systems section-dark">
            <div class="section-kicker">03 — The system</div>
            <div class="technology-system-grid">
                <article class="technology-system technology-system-feature reveal">
                    <div class="tech-media tech-media-frame"><span>01 / FRAME ARCHITECTURE</span></div>
                    <div><h2>Strength,<br><em>without weight.</em></h2><p>Continuous carbon architecture balances stiffness where power arrives and compliance where distance asks for it.</p></div>
                </article>
                <article class="technology-system reveal">
                    <div class="tech-media tech-media-control"><span>02 / CONTROL</span></div>
                    <h2>Decisive<br><em>when needed.</em></h2><p>Hydraulic braking and composed geometry keep the next decision in your hands.</p>
                </article>
                <article class="technology-system reveal">
                    <div class="tech-media tech-media-transfer"><span>03 / TRANSFER</span></div>
                    <h2>Power<br><em>without noise.</em></h2><p>Responsive drivetrain choices turn effort into forward motion with no excess theatre.</p>
                </article>
            </div>
        </section>
        <section class="technology-metric section-cream">
            <div class="section-kicker">04 — Measured in motion</div>
            <div class="technology-metric-grid">
                <div><strong>7.2</strong><span>KG / COMPLETE BUILD</span></div>
                <div><strong>42%</strong><span>LESS FRONTAL AREA</span></div>
                <div><strong>12×</strong><span>ELECTRONIC SHIFTING</span></div>
            </div>
        </section>
        <section class="technology-close section-dark">
            <p class="eyebrow"><span></span> DEVICECO / Built for the long way forward</p>
            <h2 class="display-v2 reveal">Feel the<br><em>difference.</em></h2>
            <a class="button button-light" href="{{ route('configurator') }}" data-transition>Configure your bicycle <span>↗</span></a>
        </section>
    </main>
    <x-site-footer />
</body>
</html>
