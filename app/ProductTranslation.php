<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductTranslation extends Model
{
    protected $table = 'product_translates';

    public $timestamps = false;

    protected $guarded = [];
}
