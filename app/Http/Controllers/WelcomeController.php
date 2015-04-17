<?php namespace App\Http\Controllers;

use App\Models\Product;
use View;

class WelcomeController extends Controller
{
    /**
     * Show the application welcome screen to the user.
     *
     * @return Response
     */
    public function index()
    {
        return View::make('home')->with('items', Product::all());
	}
}