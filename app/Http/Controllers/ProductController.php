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
			'status' => 1
        );
		$validator = Validator::make($data, Product::$store_rules);
		if ($validator->passes()) {
			$user            = Auth::user();
			$file = Request::file('image');
			$fileName = $file->getClientOriginalName();
			$extension = $file->getClientOriginalExtension();
			$product_data = new Product();
			$product_data->fill($data);
			$product_data['image'] = $file->getFilename().time().'.'.$extension;
			if($product_data->save()) {
				$file->move(public_path().'/uploads', $fileName);
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
