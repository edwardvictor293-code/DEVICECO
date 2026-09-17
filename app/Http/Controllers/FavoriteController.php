<?php

namespace App\Http\Controllers;

use App\Models\Bicycle;
use App\Models\Favorite;
use Illuminate\Http\RedirectResponse;

class FavoriteController extends Controller
{
    public function store(Bicycle $bicycle): RedirectResponse
    {
        Favorite::firstOrCreate(['user_id' => auth()->id(), 'bicycle_id' => $bicycle->id]);
        return back()->with('status', 'Bicycle saved to your DEVICECO.');
    }

    public function destroy(Bicycle $bicycle): RedirectResponse
    {
        Favorite::where('user_id', auth()->id())->where('bicycle_id', $bicycle->id)->delete();
        return back()->with('status', 'Bicycle removed from your DEVICECO.');
    }
}