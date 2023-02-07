<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'vino__type';


    /*Pour l'instant il n'y en a pas */
    public $timestamps = false;

     /* relation avec Bouteille */
     public function bouteilles()
     {
        return $this->hasMany(BouteillePersonalize::class);
     }
}
