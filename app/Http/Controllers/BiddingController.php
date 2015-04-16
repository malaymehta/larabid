<?php namespace App\Http\Controllers;

use App\Models\Product;
use View;

class BiddingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
	}

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function index($item_id=0)
    {
        return View::make("product.bidinfo")->with("itemInfo",Product::find($item_id));
	}
}
