<?php

namespace App\Admin\Widgets;

use TCG\Voyager\Widgets\BaseDimmer;
use App\Models\Product;

class ProductsWidget extends BaseDimmer
{
    protected $config = [];

    public function run()
    {
        return view('voyager::dimmer', [
            'title' => 'Products',
            'text' => Product::count(),
            'button' => [
                'text' => 'View all products',
                'link' => route('voyager.products.index'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/01.jpg'),
        ]);
    }
}
