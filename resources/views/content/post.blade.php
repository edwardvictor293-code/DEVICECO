<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $post->excerpt }}">
    <title>{{ $post->title }} | DEVICECO</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="content-page">
    <x-site-loader /><x-site-navigation />
    <main>
        <section class="content-detail-hero" style="--content-image:url('{{ $post->image_url }}')">
            <div class="content-detail-copy"><p class="eyebrow"><span></span> {{ $post->category }} / {{ $post->author }}</p><h1 class="display-v2">{{ $post->title }}</h1><p>{{ $post->excerpt }}</p></div>
        </section>
        <article class="article-body section-cream"><div class="section-kicker">DEVICECO / Journal</div><div class="article-copy"><p>{{ $post->body }}</p></div><a class="arrow-link" href="{{ route('journal') }}" data-transition>Back to journal <span>↗</span></a></article>
    </main>
    <x-site-footer />
</body>
</html>
