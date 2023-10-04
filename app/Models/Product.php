<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'products';
    protected $fillable = [
        'name',
        'slug',
        'price',
        'description',
        'quantity',
        'status',
        'category_id',
        'image',

    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
