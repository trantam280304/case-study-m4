<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory,SoftDeletes;
    protected $dates = [
        'created_at',
        'updated_at',
    ];
    protected $fillable = [
        'id', 'name'
    ];
    protected $primaryKey = 'id';
    protected $table = 'categories';
    public $timestamps = true;
    // public function attributes()
    // {
    //     return $this->hasMany(Attributes::class);
    // }
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
}