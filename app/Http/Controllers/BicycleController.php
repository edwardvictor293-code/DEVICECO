<?php

namespace App\Http\Controllers;

use App\Models\Bicycle;
use Illuminate\Http\Request;

class BicycleController extends Controller
{
    public function index(Request $request)
    {
        $validated = $request->validate([
            'search' => ['nullable', 'string', 'max:80'],
            'category' => ['nullable', 'in:Road,All road,Urban,Gravel,Mountain,Electric'],
        ]);

        $bicycles = Bicycle::query()
            ->when($validated['search'] ?? null, fn ($query, $search) => $query->where(function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('tagline', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhere('category', 'like', "%{$search}%");
            }))
            ->when($validated['category'] ?? null, fn ($query, $category) => $query->where('category', $category))
            ->orderByDesc('featured')->orderBy('name')->get();

        return view('bicycles.index', compact('bicycles'));
    }

    public function show(Bicycle $bicycle)
    {
        return view('bicycles.show', compact('bicycle'));
    }
}