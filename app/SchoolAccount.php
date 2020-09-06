<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolAccount extends Model
{
    protected $guarded=[];

    public function klass(){
        return $this->belongsTo(Klass::class , 'klass_id');
    }
}
