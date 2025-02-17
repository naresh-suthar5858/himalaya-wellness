<?php

use App\Models\Block;
use App\Models\Category;
use App\Models\Page;
use App\Models\Slider;

function sliders()
{
    $sliders = Slider::where('status', 1)->orderBy('ordering', 'desc')->get();

    return $sliders;
}

function blocks()
{
    $block = Block::where('status', 1)->orderBy('ordering', 'desc')->get();

    return $block;
}

function categories()
{
    $category = Category::where('status', 1)->with('products')->get();

    return $category;
}

function pages()
{
    $pages = Page::where('status', 1)->get();

    return $pages;
}


function Footpages()
{
    $pages = Page::where('status', 1)->where('show_in_footer',1)->get();

    return $pages;
}
