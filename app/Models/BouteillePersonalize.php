<?php

namespace App\Models;

use App\Models\Cellier;
use Illuminate\Database\Eloquent\Model;


class BouteillePersonalize extends Model
{
   // Empêche _aucune_ colonne d'être remplie
   protected $guarded = [];

   protected $table = 'vino__bouteille_personalize';

   /*Pour l'instant il n'y en a pas */
   public $timestamps = false;
   public $incrementing = true;


   /* relation avec table Cellier */
   public function celliers()
    {
        return $this->belongsToMany(Cellier::class, 'vino__cellier_has_vino__bouteille', 'vino__cellier_id', 'vino__bouteille_id');
    }

   /* relation avec Type */
   public function type()
   {
      return $this->belongsTo(Type::class);
   }

   /* relation avec Note */
   public function note()
   {
      $this->belongsTo(Note::class, 'id_bouteille');
   }


}
