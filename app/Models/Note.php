<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
       //use HasFactory;
   protected $guarded = [];

   protected $table = 'vino__note';

   /*Si on ajoute ses colonnes 
   public const CREATED_AT = null;
   public const UPDATED_AT = null;*/

   /*Pour l'instant il n'y en a pas */
   public $timestamps = false;
   public $incrementing = true;


         /* relation avec Bouteille */
         public function bouteille()
         {
            $this->hasOne(BouteillePersonalize::class, 'id_bouteille');
           
         }


   

}
