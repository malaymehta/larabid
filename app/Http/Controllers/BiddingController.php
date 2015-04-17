<?php namespace App\Http\Controllers;

use App\Models\Product;
use View;
use Illuminate\Support\Facades\DB;

class BiddingController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 * @return Response
	 */
	public function index($item_id = 0)
	{
		return View::make("product.bidinfo")->with("itemInfo", Product::find($item_id));
	}

	public function store()
	{
		DB::transaction(function () {
			DB::table('item_bids')->save($data);
		});
	}
}
