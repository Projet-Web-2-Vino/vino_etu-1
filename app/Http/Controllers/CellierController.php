<?php

namespace App\Http\Controllers;

use App\Http\Controllers\CelliersBouteillesController;
use App\Models\BouteillePersonalize;
use App\Models\Cellier;
use App\Models\CelliersBouteilles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CellierController extends Controller
{

    /**
     * Show
     */
    public function index(Request $request)
    {
       
       Auth::check();
       $id_usager = Auth::id();

       $idUsager = 12;
       //dd($id_usager);
       //$celliers = Cellier::where('id_usager', $id_usager)->get();

       $celliers = Cellier::where('id_usager' , $idUsager)->withCount('bouteilles')->get();

     /*$celliers = Cellier::where('id_usager' , $idUsager)->get();*/
       


     
       //dd($celliers);
/*
    
       $discussPosts = DB::table('vino__cellier')
                ->join('vino__cellier_has_vino__bouteille', 'vino__cellier_has_vino__bouteille.vino__cellier_id', '=', 'vino__cellier.id') //you used Did, I am not sure which one is a foreign key, but it seems that PostId is a foreign key after checking your table structure. Adjust your foreign key if it is not working.
                ->select('post.*', DB::raw('count(postConversation.*) as postConversationCount'))
                ->where('post.mentorid', Auth::user()->id)
                ->where('post.menteeid', $userid)
                ->where('postConversation.seen', '!=', 1)
                ->get(); 
       
       dd($celliers);
    
       //dd($count);*/
      
        return view('cellier.index', [
            'celliers' => $celliers,
            'id_usager' => $id_usager
        ]);
    }


    /*
     Retourne la vue pour ajouter un cellier
    */
    public function nouveau(Request $request)
    {

       Auth::check();
       $id_usager = Auth::id();
       
        //Liste des cellier au besoins ... 
        // TODO selon le id de l'usager pas encore implementer
         $celliers = DB::table('vino__cellier')->where('id_usager', $id_usager)
         ->get();

        //vue creation ceillier 
        return view('cellier.nouveau', [
            'celliers' => $celliers
        ]);
    }

    /*
     Création d'un ceillier dansla BD
    */
    public function creer(Request $request)
    {
        $this->validateCellier($request);

        // On assume que la requête
        $cellier = Cellier::create($request->all());

    
        //Redirect avec message de succès
        return redirect()
        ->route('cellier.index')
        ->withSuccess('Vous avez créé le cellier '.$cellier->nom_cellier.'!');
    }


    /**
     * Edit
    */
    public function edit(Request $request, $id)
    {
      
        //dd($id);
        $cellier = Cellier::findOrFail($id);
       
        return view('cellier.edit', [
            'cellier' => $cellier,
        ]);
    }



     /**
     * Update
     */
    public function update(Request $request, $id)
    {
        //dd($id);
        $this->validateCellier($request);

        // On assume que la requête
        $cellier = Cellier::findOrFail($id)->update($request->all());


        // Retourne au formulaire
        return redirect()
            ->route('cellier.index')
            ->withSuccess('La modification a réussi!');
    }


    /**
     * Supprime
     */
    public function supprime(Request $request, $id)
    {
        //dd($id);
        $cellier = Cellier::findOrFail($id);
        $cellier->delete();
        
        return "Vous avez supprimer le cellier {$cellier->name} !";

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
