<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    
   protected $guarded = [];

   protected $table = 'vino__note';

   public $timestamps = false;
   public $incrementing = true;


    /* relation avec Bouteille */
    public function bouteille()
    {
    $this->hasOne(BouteillePersonalize::class, 'id_bouteille');

    }


   

}
