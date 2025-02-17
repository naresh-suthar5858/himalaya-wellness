<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Category extends Model implements HasMedia
{
    use HasFactory ,InteractsWithMedia ;

    protected $fillable = [

    'parent_category',	
    'name',	
    'status',
    'show_in_menu',
    'url_key',	
    'meta_tag',
    'meta_title',
    'meta_description',
    'short_description'	,
    'description'
    
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class , 'product_categories');
    }

}
