<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\BicycleController;
use App\Http\Controllers\ConfiguratorController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompareController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/bicycles', [BicycleController::class, 'index'])->name('bicycles.index');
Route::get('/bicycles/{bicycle:slug}', [BicycleController::class, 'show'])->name('bicycles.show');
Route::get('/checkout/{bicycle:slug}', [CheckoutController::class, 'create'])->name('checkout');
Route::post('/checkout/{bicycle:slug}', [CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/checkout/confirmation/{order}', [CheckoutController::class, 'confirmation'])->name('checkout.confirmation');
Route::get('/configurator', [ConfiguratorController::class, 'create'])->name('configurator');
Route::get('/configurator/{bicycle:slug}', [ConfiguratorController::class, 'create'])->name('configurator.bicycle');
Route::get('/compare', [CompareController::class, 'index'])->name('compare');
Route::view('/technology', 'technology')->name('technology');
Route::post('/compare', [CompareController::class, 'store'])->name('compare.store');
Route::delete('/compare/{bicycle:slug}', [CompareController::class, 'destroy'])->name('compare.destroy');

Route::middleware('auth')->group(function () {
    Route::post('/bicycles/{bicycle:slug}/favorite', [FavoriteController::class, 'store'])->name('favorites.store');
    Route::delete('/bicycles/{bicycle:slug}/favorite', [FavoriteController::class, 'destroy'])->name('favorites.destroy');
    Route::post('/configurator', [ConfiguratorController::class, 'store'])->name('configurator.store');
});

Route::get('/admin', [AdminController::class, 'index'])->middleware('auth')->name('admin');
Route::get('/routes', [ContentController::class, 'routes'])->name('routes');
Route::get('/routes/{route:slug}', [ContentController::class, 'route'])->name('routes.show');
Route::get('/journal', [ContentController::class, 'journal'])->name('journal');
Route::get('/journal/{post:slug}', [ContentController::class, 'post'])->name('journal.show');
Route::view('/about', 'pages.standard', ['title' => 'About DEVICECO', 'kicker' => 'About / The long way forward', 'headline' => 'Built for the in-between.', 'body' => 'DEVICECO exists at the intersection of precision engineering, quiet design, and the freedom of an open road.', 'action' => 'Explore the collection'])->name('about');
Route::view('/contact', 'pages.contact')->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::view('/privacy', 'pages.standard', ['title' => 'Privacy', 'kicker' => 'Legal / Privacy', 'headline' => 'Your data, handled with care.', 'body' => 'This demo page is a structured placeholder for DEVICECO final privacy policy copy.', 'action' => 'Back home'])->name('privacy');
Route::view('/terms', 'pages.standard', ['title' => 'Terms', 'kicker' => 'Legal / Terms', 'headline' => 'Clear terms for the journey.', 'body' => 'This demo page is a structured placeholder for DEVICECO final terms of service copy.', 'action' => 'Back home'])->name('terms');
Route::view('/maintenance', 'pages.standard', ['title' => 'Maintenance center', 'kicker' => 'Care / Keep moving', 'headline' => 'A little care goes a long way.', 'body' => 'Practical guidance for chain care, brake checks, tire pressure, cleaning, storage, and confident everyday riding.', 'action' => 'Explore bicycles'])->name('maintenance');
Route::get('/sitemap.xml', SitemapController::class)->name('sitemap');

Route::get('/dashboard', function () {
    $favorites = auth()->user()->favorites()->orderBy('name')->get();
    return view('dashboard', compact('favorites'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
