<?php

namespace App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class OrderFilters extends QueryFilters
{
    protected array $allowedFilters = ['order_no', 'status', 'payment_status'];

    protected array $columnSearch = [];
}
