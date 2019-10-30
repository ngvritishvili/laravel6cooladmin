<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Laravel\Scout\Searchable;

class Product extends Model implements TranslatableContract
{
    use Translatable;
    use Searchable;


    protected $table = 'products';
    public $translatedAttributes = ['name', 'description', 'style', 'material'];

    protected $guarded = [];

    public function toSearchableArray()
    {
        $data = $this->toArray();
        $data['images'] = $this->images->toArray();
        return $data;
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
