<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Block extends Model implements HasMedia
{
    use HasFactory , InteractsWithMedia;

    // use HasFactory;
    protected $fillable = [
        'identifier',
        'title',
        'heading',
        'description',
        'ordering',
        'status',
        
    ];
}
