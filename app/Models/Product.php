<?php
namespace App\Models;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;
use Eloquent;

class Product extends \Eloquent
{
    protected $guarded = [];
    protected $table = 'user_items';
    public $timestamps = false;

	public static $store_rules = array(
		'title' => 'Required',
		'description' => 'Required',
		'image' => 'Required|mimes:jpeg,bmp,png',
        'min_bid' => 'Required'
	);

    public function user()
    {
        return $this->belongsTo('App\Models\User','id','user_id');
    }
}