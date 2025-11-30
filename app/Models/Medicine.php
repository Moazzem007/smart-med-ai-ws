<?php

namespace App\Models;

use App\Filters\MedicineFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Medicine extends Model
{
    use HasFactory, Filterable;

    protected string $default_filters = MedicineFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'id',
		'sku',
		'gtin',
		'brand_name',
		'generic_name',
		'manufacturer',
		'model_code',
		'strength',
		'form',
		'pack_size',
		'unit',
		'is_prescription',
		'controlled_drug',
		'schedule',
		'storage_temp',
		'expiry_months',
		'base_price',
		'categories',
		'tags',
		'search_vector',
		'attributes',
		'images',
		'metadata',
		'active',
		'deleted_at',
    ];


}
