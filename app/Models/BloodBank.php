<?php

namespace App\Models;

use App\Filters\BloodBankFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class BloodBank extends Model
{
    use HasFactory, Filterable;

    protected string $default_filters = BloodBankFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */

    protected $table = 'bloodbanks';
    protected $fillable = [
		'name',
		'name_bn',
		'code',
		'slug',
		'facility_type',
		'is_private',
		'division',
		'district',
		'city_corporation',
		'upazila',
		'mobile_1',
		'mobile_2',
		'email',
		'address',
		'latitude',
		'longitude',
		'completeness_percentage',
		'is_active',
    ];


}
