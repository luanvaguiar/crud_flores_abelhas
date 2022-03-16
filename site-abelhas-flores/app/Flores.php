<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flores extends Model
{
    protected $table = 'flores';

    protected $fillable = ['nome_flor', 'especie_flor', 'descricao', 'meses', 'foto_flor', 'abelhas'];

    public $timestamps = false;
}
