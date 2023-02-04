<?php

namespace App\Http\Controllers;

use App\Http\Controllers\CelliersBouteillesController;
use App\Models\BouteillePersonalize;
use App\Models\Cellier;
use App\Models\CelliersBouteilles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class CellierController extends Controller
{

    /**
     * Show
     */
    public function index(Request $request)
    {
       $titre = 'cellier' ;
       $field = User::findOrFail(Auth::id());
       if(Auth::check()){
            $id_usager = Auth::id();
            $celliers = Cellier::where('id_usager' , $id_usager)->withCount('bouteilles')->get();
            if ($field->is_admin == 1) {
                return redirect('/admin');
            } else {
                return view('cellier.index', [
                    'celliers' => $celliers,   
                    'id_usager' => $id_usager,
                    'titre' => $titre
                ]);
            }
        } else{
            return redirect('/login');
        }
        
    }


    /*
     Retourne la vue pour ajouter un cellier
    */
    public function nouveau(Request $request)
    {

        if(Auth::check()){ 
            $titre = "cellier" ;
                Auth::check();
            $id_usager = Auth::id();
            
                //Liste des cellier au besoins ... 
                // TODO selon le id de l'usager pas encore implementer
                $celliers = DB::table('vino__cellier')->where('id_usager', $id_usager)
                ->get();

                //vue creation ceillier 
                return view('cellier.nouveau', [
                    'celliers' => $celliers,
                    'titre' => $titre
                ]);
        }else{
            return redirect('/login');
        }
    }

    /*
     Création d'un ceillier dansla BD
    */
    public function creer(Request $request)
    {
        if(Auth::check()){ 
            $this->validateCellier($request);

            // On assume que la requête
            $cellier = Cellier::create($request->all());

        
            //Redirect avec message de succès
            return redirect()
            ->route('cellier.index')
            ->withSuccess('Vous avez créé le cellier '.$cellier->nom_cellier.'!');
        }else{
            return redirect('/login');
        }
    }


    /**
     * Edit
    */
    public function edit(Request $request, $id)
    {
        if(Auth::check()){
            //dd($id);
            $cellier = Cellier::findOrFail($id);
            $titre = 'cellier' ;
            return view('cellier.edit', [
                'cellier' => $cellier,
                'titre' => $titre
            ]);
        }else{
            return redirect('/login');
        }
    }



     /**
     * Update
     */
    public function update(Request $request, $id)
    {
        if(Auth::check()){ 
            //dd($id);
            $this->validateCellier($request);

            // On assume que la requête
            $cellier = Cellier::findOrFail($id)->update($request->all());


            // Retourne au formulaire
            return redirect()
                ->route('cellier.index')
                ->withSuccess('La modification a réussi!');
        }else{
            return redirect('/login');
        }
    }


    /**
     * Supprime
     */
    public function supprime(Request $request, $id)
    {
        if(Auth::check()){ 
            $cellier = Cellier::find($id);
            $nomCellier = $cellier->nom_cellier;
            $cellier->delete();

            // Retourne au cellier
            return redirect()
                ->route('cellier.index')
                ->withSuccess("Vous avez supprimer le cellier  {$nomCellier}  !");
    
        }else{
            return redirect('/login');
        }
    }


    /**
     * Fonction qui permet de valider les données de l'usager
     */
    private function validateCellier(Request $request)
    {
        $request->validate([
            'nom_cellier' => 'required'
        ]);
    }


}
