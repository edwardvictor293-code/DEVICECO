<?php
namespace App\Http\Controllers;
use App\Models\Bicycle;
use Illuminate\Http\Request;

class AdminController extends Controller
{
	public function index(Request $request)
	{
		$this->authorizeAdmin($request);

		return view('admin.index', ['bicycles' => Bicycle::orderBy('name')->get()]);
	}

	private function authorizeAdmin(Request $request): void
	{
		abort_unless($request->user()?->is_admin === true, 403);
	}
}