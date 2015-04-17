<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Product;
use View, Validator, Input, Auth, Request, Session, Redirect;

class ProductController extends Controller
{

	/**
	 * Show the form for creating a new resource.
	 * @return Response
	 */
	public function create()
	{
		return View::make('product.add');
	}

	/**
	 * Store a newly created resource in storage.
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make(Input::all(), Product::$product_rules);
		if ($validator->passes()) {
			$user        = Auth::user();
			$file_rename = $this->renameImage();
			if (Request::file('image')->move(public_path() . '/uploads', $file_rename)) {
				$product_data = new Product();
				$product_data->fill(Input::all());
				$product_data['image'] = $file_rename;
				if ($user->product()->save($product_data)) {
					Session::flash('message.success', 'Item added successfully.');
					return Redirect::to("home");
				} else {
					Session::flash('message.arrayErrors', $validator->messages()->all());
					return Redirect::to('add-product')->withInput(Input::all());
				}
			}
		} else {
			Session::flash('message.arrayErrors', $validator->messages()->all());
			return Redirect::to('add-product')->withInput(Input::all());
		}
	}

	public function info($item_id = 0)
	{
		$relatedItemInfo = Product::where("item_id", "!=", $item_id);
		$itemInfo        = Product::find($item_id);
		return View::make("product.info")->with("itemInfo", $itemInfo)->with("relatedItemInfo", $relatedItemInfo);
	}

	public function renameImage()
	{
		$file        = Request::file('image');
		$extension   = $file->getClientOriginalExtension();
		$file_rename = str_random() . '.' . $extension;
		return $file_rename;
	}


}
