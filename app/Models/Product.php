<?php
namespace App\Models;

use Eloquent;

class Product extends \Eloquent
{
	protected $guarded = [];
	protected $table = 'user_items';
	public $timestamps = false;
	protected $attributes = array('status' => '1');

	public function __construct(array $attributes = array())
	{
		//$this->setRawAttributes(array('bid_end_time' => \Input::get("bid_start_time")->addDays(30)), true);
		parent::__construct($attributes);
	}

	public static $product_rules = array(
		'title'       => 'Required',
		'description' => 'Required',
		'min_bid'     => 'Required'
	); //'image'       => 'Required|mimes:jpeg,bmp,png',

	public function user()
	{
		return $this->belongsTo('App\Models\User', 'id', 'user_id');
	}

	public function bids()
	{
		return $this->belongsTo('App\Models\Bids', 'id', 'product_id');
	}
}