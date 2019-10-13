<?php

namespace App;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class About extends Model implements TranslatableContract
{
    use Translatable;
    public $translatedAttributes = ['title', 'article'];
    protected $guarded = [];

}
