<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContentTranslation extends Model
{
    protected $table = 'contents_translate';

    public $timestamps = false;

    protected $guarded = [];
}
