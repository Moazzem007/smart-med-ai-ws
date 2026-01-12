<?php

namespace App\Models;

use App\Filters\CartFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Cart extends Model
{
    use HasFactory, Filterable;

    protected string $default_filters = CartFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    
    protected $fillable = [
        'user_id',
		'status',
		'subtotal',
		'discount',
		'tax',
		'grand_total',
    ];

	public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
	{
		return $this->belongsTo(\App\Models\User::class);
	}

}
