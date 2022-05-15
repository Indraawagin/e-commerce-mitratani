<?php

namespace App\Models;

use App\Http\Requests\Admin\CategoryRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name', 'price', 'description', 'categories_id', 'stock', 'weight', 'slug'
    ];

    protected $hidden = [];

    public function galleries()
    {
        return $this->hasMany(ProductGallery::class, 'products_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id', 'id');
    }
}
