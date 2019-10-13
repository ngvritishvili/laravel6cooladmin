<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['image', 'product_id'];

    protected $table = 'images';

    public function owner()
    {
        return $this->belongsTo(Product::class);
    }
}
