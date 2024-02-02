<?php

namespace App\Models\admin\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;
    protected $table = "product";
    protected $primaryKey = "id";
    protected $fillable = [
        "id",
        "title",
        "photo"
    ];
}
