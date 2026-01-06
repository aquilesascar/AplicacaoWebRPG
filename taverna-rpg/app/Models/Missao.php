<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Missao extends Model
{
    use HasFactory;

    protected $table = 'aquiles_rpg.missoes';
    public $timestamps = false;
    protected $fillable = ['titulo', 'recompensa', 'dificuldade'];
}