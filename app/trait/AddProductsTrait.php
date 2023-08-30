<?php

namespace App\trait;

use App\Models\Product;
use Illuminate\Support\Facades\DB;

trait AddProductsTrait
{
    public $search;
    public $fetch_products = [];

    public function updatedSearch($val)
    {
        $this->fetch_products = [];
        if (strlen($val) > 2) {
            $this->fetch_products = Product::where('name', 'LIKE', '%' . $val . '%')
                ->limit(10)->get()->toArray();
        }
        $this->dispatchBrowserEvent('productSearch');
    }

}
