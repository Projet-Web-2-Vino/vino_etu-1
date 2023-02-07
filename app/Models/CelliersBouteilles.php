<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class CelliersBouteilles extends Model
{
    //use HasFactory;

    // Empêche _aucune_ colonne d'être remplie
    protected $guarded = [];

    protected $table = 'vino__cellier_has_vino__bouteille';

    /*Pour l'instant il n'y en a pas */
    public $timestamps = false;

    public $incrementing = false;
   
}
