<?php

namespace App;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model implements TranslatableContract
{
    use Translatable;

    protected $table = 'categories';
    public $translatedAttributes = ['name'];

    protected $guarded = [];

    public function sub()
    {
        return $this->hasOne(SubCategory::class);
    }

}
