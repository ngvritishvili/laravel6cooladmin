<?php

namespace App;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;


class SubCategory extends Model implements TranslatableContract
{
    use Translatable, Searchable;

    protected $table = 'sub_categories';
    public $translatedAttributes = ['name'];

    protected $guarded = [];

    public function toSearchableArray()
    {
        $data = $this->toArray();
        $data['products'] = $this->products->toArray();
        return $data;
    }



    public function products()
    {
        return $this->hasMany(Product::class)->orderBy('created_at', 'desc');
    }

}
