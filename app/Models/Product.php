<?php
namespace App\Models;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;
use Eloquent;

class Product extends \Eloquent
{
    protected $fillable = [];
    protected $table = 'user_items';

	public static $store_rules = array(
		'title' => 'Required',
		'description' => 'Required',
		'image' => 'Required|mimes:jpeg,bmp,png'
	);

    public function user()
    {
        return $this->belongsTo('App\Models\Product');
    }
}