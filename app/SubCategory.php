<?php

namespace App;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model implements TranslatableContract
{
    use Translatable;

    protected $table = 'sub_categories';
    public $translatedAttributes = ['name'];

    protected $guarded = [];

    public function products()
    {
        return $this->hasMany(Product::class)->orderBy('created_at', 'desc');
    }

}
