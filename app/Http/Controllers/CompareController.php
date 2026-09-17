<?php

namespace App\Http\Controllers;

use App\Models\Bicycle;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CompareController extends Controller
{
    public function index(Request $request)
    {
        $ids = array_slice(array_map('intval', $request->session()->get('compare', [])), 0, 3);
        return view('compare', ['bicycles' => Bicycle::whereIn('id', $ids)->get(), 'allBicycles' => Bicycle::orderBy('name')->get()]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate(['bicycle_id' => ['required', 'integer', 'exists:bicycles,id']]);
        $ids = $request->session()->get('compare', []);
        if (! in_array((int) $validated['bicycle_id'], $ids, true) && count($ids) < 3) {
            $ids[] = (int) $validated['bicycle_id'];
        }
        $request->session()->put('compare', $ids);
        return back()->with('status', count($ids) >= 3 ? 'Comparison is full.' : 'Bicycle added to comparison.');
    }

    public function destroy(Request $request, Bicycle $bicycle): RedirectResponse
    {
        $request->session()->put('compare', array_values(array_filter($request->session()->get('compare', []), fn ($id) => (int) $id !== $bicycle->id)));
        return back()->with('status', 'Bicycle removed from comparison.');
    }
}