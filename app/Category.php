<?php

namespace App;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;


class Category extends Model implements TranslatableContract
{
    use Translatable, Searchable;

    protected $table = 'categories';
    public $translatedAttributes = ['name'];

    protected $guarded = [];

    public function toSearchableArray()
    {
        $data = $this->toArray();
        $data['sub'] = $this->sub->toArray();
        return $data;
    }

    public function sub()
    {
        return $this->hasOne(SubCategory::class);
    }

}
