<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;
    protected $fillable=[
        'pro_name','cat_id','stock','slug','desc','price','status',
    ];

    public function categories(){
        return $this->hasMany(Category::class);
    }
}
