<?php
namespace App\Http\Controllers;
use App\Models\Bicycle;
use App\Models\CyclingRoute;
use App\Models\JournalPost;
use Illuminate\Http\Response;
class SitemapController extends Controller { public function __invoke(): Response { $urls = collect(['/', '/bicycles', '/configurator', '/compare', '/routes', '/journal', '/about', '/contact', '/maintenance'])->map(fn ($url) => url($url)); $urls = $urls->merge(Bicycle::pluck('slug')->map(fn ($slug) => url('/bicycles/'.$slug)))->merge(CyclingRoute::pluck('slug')->map(fn ($slug) => url('/routes/'.$slug)))->merge(JournalPost::pluck('slug')->map(fn ($slug) => url('/journal/'.$slug))); return response()->view('sitemap', compact('urls'))->header('Content-Type', 'application/xml'); } }