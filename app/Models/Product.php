<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['id', 'nama', 'categories_id', 'brands_id', 'harga', 'stok', 'foto', 'created_at', 'updated_at'];

    public function kategori()
    {
        return $this->belongsTo(Categorie::class, 'categories_id');
    }
    public function Merek()
    {
        return $this->belongsTo(Brand::class, 'brands_id');
    }
}
