<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SAQ;
use App\Models\Bouteille;

class SAQController extends Controller
{
    /** 
     * Importation des données de la SAQ dans la bd
     *
    */
    public function import()
    {
        $saq = new SAQ;

        $page = 1;
	    $nombreProduit = 2; //48 ou 96	


        $saq -> getProduits($nombreProduit,$page);//import les produits
        $msg = 'Importation réussie !';
        $data = Bouteille::get();
      
        return redirect()
        ->route('admin.index')
        ->withSuccess('Importation réussi!');
    }
}
