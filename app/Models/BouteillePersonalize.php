<?php

namespace App\Models;

use App\Models\Cellier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BouteillePersonalize extends Model
{
   //use HasFactory;
   protected $guarded = [];

   protected $table = 'vino__bouteille_personalize';

   /*Si on ajoute ses colonnes 
   public const CREATED_AT = null;
   public const UPDATED_AT = null;*/

   /*Pour l'instant il n'y en a pas */
   public $timestamps = false;
   public $incrementing = true;


   /* relation avec Cellier */
   public function celliers()
    {
        return $this->belongsToMany(Cellier::class, 'vino__cellier_has_vino__bouteille', 'vino__cellier_id', 'vino__bouteille_id');
    }

   /* relation avec Type */
   public function type()
   {
      return $this->belongsTo(Type::class);
   }


}
