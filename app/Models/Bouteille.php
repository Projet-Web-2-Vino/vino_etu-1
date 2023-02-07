<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Bouteille extends Model
{
    // Empêche _aucune_ colonne d'être remplie
    protected $guarded = [];

    protected $table = 'vino__bouteille';

    public $timestamps = false;


}
