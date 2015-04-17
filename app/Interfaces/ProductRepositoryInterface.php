<?php
/**
 * Created by PhpStorm.
 * User: shabbir
 * Date: 8/18/14
 * Time: 9:44 PM
 */
namespace App\Interfaces;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

interface ProductRepositoryInterface {
    /**
     * @param $product_id
     * @return Product|Product[]|Collection|null
     */
	public function byIDWithDetails($product_id);

	public function byCategoryByPage($category, $sort_by, $sort_order, $page, $limit);
	public function searchByPage($q, $sort_by, $sort_order, $page, $limit);

    /**
     * @param $product_id
     * @return mixed|array
     */
    public function getPersonalization($product_id);
}