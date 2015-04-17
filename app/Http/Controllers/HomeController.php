<?php namespace App\Http\Controllers;

use View;
use App\Models\Product;

class HomeController extends Controller
{
	/**
	 * Show the application dashboard to the user.
	 * @return Response
	 */
	public function index()
	{
		return View::make('home')->with('items', Product::all());
	}
}
