<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $dates = [
        'created_at',
        'updated_at',
    ];
    protected $fillable = [
         'name','image' ,'description','price','quantity','status' ,'category_id'
    ];
    protected $primaryKey = 'id';
    protected $table = 'products';
    public $timestamps = true;


   public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
