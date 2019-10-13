<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributeTranslation extends Model
{
    protected $table = 'attribute_translates';

    public $timestamps = false;

    protected $guarded = [];
}
