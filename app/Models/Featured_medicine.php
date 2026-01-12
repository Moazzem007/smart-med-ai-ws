<?php

namespace App\Models;

use App\Filters\Featured_medicineFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Featured_medicine extends Model
{
    use HasFactory, Filterable;

    protected string $default_filters = Featured_medicineFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
		'medicine_id',
		'sort_order',
		'active',
		'updated_at',
    ];


}
