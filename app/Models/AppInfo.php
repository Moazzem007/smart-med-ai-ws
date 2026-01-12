<?php

namespace App\Models;

use App\Filters\AppInfoFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class AppInfo extends Model
{
    use HasFactory, Filterable;

    protected string $default_filters = AppInfoFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'platform',
		'current_version',
		'minimum_version',
		'maintenance_mode',
		'maintenance_message',
		'force_update',
		'active',
    ];


}
