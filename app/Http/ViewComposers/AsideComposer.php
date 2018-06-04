<?php

namespace App\Http\ViewComposers;

use App\Category;
use App\Tag;
use Illuminate\View\View;

class AsideComposer {

    public function compose(View $view)
    {
        $categories = Category::orderBy('id', 'DESC')->get();
        $tags = Tag::orderBy('id', 'DESC')->get();

        $view->with('categories', $categories)
            ->with('tags', $tags);
    }
}