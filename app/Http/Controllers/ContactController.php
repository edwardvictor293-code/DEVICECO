<?php
namespace App\Http\Controllers;
use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
class ContactController extends Controller
{
	public function store(Request $request): RedirectResponse
	{
		$validated = $request->validate([
			'name' => ['required', 'string', 'max:100'],
			'email' => ['required', 'email', 'max:160'],
			'subject' => ['required', 'string', 'max:160'],
			'message' => ['required', 'string', 'max:3000'],
		]);

		ContactMessage::create($validated);

		return back()->with('status', 'Message received. The DEVICECO team will be in touch.');
	}
}