<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="DEVICECO engineering stories, route notes, and considered guidance.">
    <title>Journal | DEVICECO</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="content-page">
    <x-site-loader />
    <x-site-navigation />
    <main>
        <section class="content-hero content-hero-journal">
            <div class="content-hero-copy"><p class="eyebrow"><span></span> Journal / Field notes</p><h1 class="display-v2">Thoughts in<br><em>motion.</em></h1><p>Engineering stories, route notes, and considered guidance for people who keep moving.</p></div>
        </section>
        <section class="content-index section-cream">
            <div class="section-kicker">02 — The publication</div>
            <div class="editorial-grid">
                @forelse($posts as $post)
                    <a class="editorial-card reveal" href="{{ route('journal.show', $post) }}" data-transition>
                        <div class="editorial-image" style="background-image:url('{{ $post->image_url }}')"><span>{{ $post->category }} / {{ $post->author }}</span></div>
                        <div class="editorial-card-copy"><h2>{{ $post->title }}</h2><p>{{ $post->excerpt }}</p></div>
                    </a>
                @empty
                    <p class="empty-editorial">No journal posts published yet. The next story is taking shape.</p>
                @endforelse
            </div>
        </section>
    </main>
    <x-site-footer />
</body>
</html>
