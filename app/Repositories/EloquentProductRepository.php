<?php
/**
 * Created by PhpStorm.
 * User: malay.mehta
 * Date: 5/16/15
 * Time: 9:40 PM
 */

namespace App\Repositories;

use App\Interfaces\ProductRepositoryInterface;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Cache;

class EloquentProductRepository implements ProductRepositoryInterface
{
	/**
	 * @param $product_id
	 * @return Product|Product[]|Collection|null
	 */
	public function byIDWithBiddingDetails($item_id)
	{
        $base_relationships = array("bids");
        $relationships = $base_relationships;

        /** @var Collection $products */
		$products = Cache::remember('product'.implode("_",$product_id),CATALOG_CACHE_TIMEOUT,function()use($item_id,$base_relationships){
			return Product::with($base_relationships)->whereIn('product_id', $item_id)->get();
		});
		foreach($products as $product) {
            $product->prepare();
        }
        return $return_first? $products->first() : $products;
	}

} 