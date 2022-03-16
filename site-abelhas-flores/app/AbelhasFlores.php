<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AbelhasFlores extends Model
{
    protected $table = 'abelhas_flores';

    protected $fillable = ['id_flor', 'id_abelha'];

    public $timestamps = false;
}
