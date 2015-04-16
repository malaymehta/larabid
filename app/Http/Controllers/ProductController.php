<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use View, Validator, Input, Auth, Request, Session, Redirect;

class ProductController extends Controller {

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('product.items');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = array(
            'title' => Input::get('title'),
			'description' => Input::get('description'),
			'image' => Input::get('image'),
			'min_bid' => Input::get('min_bid'),
			'status' => 1
        );
		$validator = Validator::make(Input::all(), Product::$store_rules);
		if ($validator->passes()) {
			$user            = Auth::user();
			$file = Request::file('image');

			$extension = $file->getClientOriginalExtension();
      		$file_rename = rand(11111,99999).'.'.$extension;
			$product_data = new Product();
			$product_data->fill($data);
			$product_data['image'] = $file_rename;

			if($user->product()->save($product_data)) {
				$file->move(public_path().'/uploads', $file_rename);
			} else {
				Session::flash('message.arrayErrors', $validator->messages()->all());
				return Redirect::to('product.items')->withInput(Input::all());
			}

			Session::flash('message.success', ' Item successfully added.');
			return Redirect::to("home");
		} else {
			Session::flash('message.arrayErrors', $validator->messages()->all());
			return Redirect::to('home');
		}
	}



}
