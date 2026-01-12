<?php

namespace App\Models;

use App\Filters\Promotional_bannerFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Promotional_banner extends Model
{
    use HasFactory, Filterable;

    protected string $default_filters = Promotional_bannerFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
		'title',
		'image_path',
		'link_url',
		'position',
		'sort_order',
		'start_date',
		'end_date',
		'active',
		'company_no',
		'entered_by',
		'entry_timestamp',
		'updated_by',
		'update_timestamp',
    ];


}
