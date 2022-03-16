<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Abelha extends Model
{
    protected $table = 'abelhas';

    protected $fillable = ['nome_abelha', 'especie_abelha'];

    public $timestamps = false;
}
