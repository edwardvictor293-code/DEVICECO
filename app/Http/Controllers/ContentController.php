<?php
namespace App\Http\Controllers;
use App\Models\CyclingRoute;
use App\Models\JournalPost;
class ContentController extends Controller
{
    public function routes() { return view('content.routes', ['routes' => CyclingRoute::latest()->get()]); }
    public function route(CyclingRoute $route) { return view('content.route', compact('route')); }
    public function journal() { return view('content.journal', ['posts' => JournalPost::whereNotNull('published_at')->latest('published_at')->get()]); }
    public function post(JournalPost $post) { return view('content.post', compact('post')); }
}