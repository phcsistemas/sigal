<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    protected $table = 'salas';

    protected $fillable = array('predio', 'andar', 'numero', 'capacidade', 'tipo', 'acessibilidade');
}
