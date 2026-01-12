<?php

namespace App\Models;

use App\Filters\CartItemFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class CartItem extends Model
{
    use HasFactory, Filterable;

    protected string $default_filters = CartItemFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'cart_id',
		'product_id',
		'product_type',
		'product_name',
		'unit_price',
		'quantity',
		'line_total',
    ];

	public function cart(): \Illuminate\Database\Eloquent\Relations\BelongsTo
	{
		return $this->belongsTo(\App\Models\Cart::class);
	}

}
