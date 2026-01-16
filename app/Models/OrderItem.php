<?php

namespace App\Models;

use App\Filters\OrderItemFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class OrderItem extends Model
{
    use HasFactory, Filterable;

    protected string $default_filters = OrderItemFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'order_id',
		'product_id',
		'product_type',
		'product_name',
		'unit_price',
		'quantity',
		'line_total',
    ];

	public function order(): \Illuminate\Database\Eloquent\Relations\BelongsTo
	{
		return $this->belongsTo(\App\Models\Order::class);
	}

}
