<?php

namespace App\Admin\Widgets;

use TCG\Voyager\Widgets\BaseDimmer;
use App\Models\Category;

class CategoriesWidget extends BaseDimmer
{
    protected $config = [];

    public function run()
    {
        return view('voyager::dimmer', [
            'title' => 'Categories',
            'text' => Category::count(),
            'button' => [
                'text' => 'View all categories',
                'link' => route('voyager.categories.index'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/02.jpg'),
        ]);
    }
}
