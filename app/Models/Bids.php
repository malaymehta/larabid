<?php
namespace App\Models;

use Eloquent;

class Bids extends \Eloquent {
	protected $guarded = [];
	protected $table = 'item_bids';
	public $timestamps = false;

	public function bids() {
		return $this->belongsTo('App\Models\Bids', 'id', 'user_id');
	}

	public function scopeActive($query) {
		return $query
				->whereIsActive('1')
				->where(function ($query) {
					$query->where('bid_start_time', '0000-00-00 00:00:00')->orWhereNull('bid_start_time')->orWhere('bid_start_time', '<=', date('Y-m-d', time()));
				})
				->where(function ($query) {
					$query->where('bid_end_time', '0000-00-00 00:00:00')->orWhereNull('bid_end_time')->orWhere('bid_end_time', '>=', date('Y-m-d', time()));
				});
	}

}