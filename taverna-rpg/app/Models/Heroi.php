<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Heroi extends Model
{
    use HasFactory;

    //define a tabela exata (com o esquema)
    protected $table = 'aquiles_rpg.herois';

    //desativa timestamps (created_at)
    public $timestamps = false;

    //libera os campos para serem salvos
    protected $fillable = ['nome', 'classe', 'nivel'];
}