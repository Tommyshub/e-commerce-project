<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'description', 'price', 'category_id'
    ];

    // Fetch the category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Fetch all images
    public function images()
    {
        return $this->hasMany(Image::class, 'product_id');
    }

    // Fetch the thumbnail image
    public function thumbnail()
    {
        return $this->hasOne(Image::class, 'product_id')->where('is_thumbnail', 1);
    }

    /* 
    * This is a polymorphic relationship
    * The productable model can be a for example a Rim or a Tyre
    */
    public function productable()
    {
        return $this->morphTo();
    }
}
