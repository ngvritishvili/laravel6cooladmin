<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    protected $table = 'infos';
    protected $guarded = [];

    public function slides()
    {
        return $this->hasMany(Slides::class);
    }

    public function partners()
    {
        return $this->hasMany(Partners::class);
    }

}
