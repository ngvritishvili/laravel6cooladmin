<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends Model
{
    protected $table = 'category_translates';

    public $timestamps = false;

    protected $guarded = [];
}
