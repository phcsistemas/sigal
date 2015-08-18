<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    protected $table = 'professores';

    protected $fillable = array('nome','ra','curso_id','cgu','email','fone',);
}
