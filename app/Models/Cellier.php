<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Cellier extends Model
{
    

     // Empêche _aucune_ colonne d'être remplie
     protected $guarded = [];

    protected $table = 'vino__cellier';

    /*Pour l'instant il n'y en a pas */
    public $timestamps = false;

    public $incrementing = true;

   /* relation avec Bouteille peut avoir de 0 è n Bouteille */
   public function bouteilles()
   {
       return $this->belongsToMany(BouteillePersonalize::class, 'vino__cellier_has_vino__bouteille', 'vino__cellier_id', 'vino__bouteille_id');
 
   }
   

   /* relation avec User */
    public function user()
    {
        return $this->belongsTo(User::class);
    }




}
