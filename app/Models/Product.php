<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //Model com os campos que estavam sendo solicitados.
    use HasFactory;
    
    protected $fillable = [
        'name',
        'price',
        'quantity',
        'description',
    ];

     /**
     * Get product by ID.
     *
     * @param  int  $product_id
     * @return \App\Models\Product|null
     */
    public function get_product_by_id($product_id)
    {
        return $this->find($product_id);
    }
}
