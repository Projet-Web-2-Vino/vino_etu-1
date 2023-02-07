<?php

namespace App\Http\Controllers;


use App\Models\Bouteille;
use App\Models\BouteillePersonalize;
use App\Models\Cellier;
use App\Models\CelliersBouteilles;
use App\Models\Note;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
//use Illuminate\Http\Request;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class BouteilleController extends Controller
{
    //
    public function index(Request $request, $id)
    {

        if(Auth::check()){
            $id_usager = Auth::id();

            $type = Request::get('type');
            $pays = Request::get('pays');
            
           // dd($type);

           
            $bouteilles = DB::table('vino__cellier_has_vino__bouteille')
                ->select('*')
                ->leftjoin('vino__note', 'vino__bouteille_id', '=', 'vino__note.id_bouteille')
                ->join('vino__bouteille_personalize', 'vino__bouteille_id', '=', 'vino__bouteille_personalize.id')
                ->join('vino__cellier', 'vino__cellier_id', '=', 'vino__cellier.id')
                ->where('vino__cellier_id', $id)
                ->orderBy('vino__bouteille_id', 'DESC')
                ->get();

                //dd($bouteilles);

                if($type){
                    $bouteilles = DB::table('vino__cellier_has_vino__bouteille')
                    ->select('*')
                    ->join('vino__bouteille_personalize', 'vino__bouteille_id', '=', 'vino__bouteille_personalize.id')
                    ->join('vino__cellier', 'vino__cellier_id', '=', 'vino__cellier.id')
                    ->join('vino__note', 'vino__bouteille_id', '=', 'vino__note.id')
                    ->where('vino__cellier_id', $id)
                    ->where('type', $type)
                    ->orderBy('vino__bouteille_id', 'DESC')
                    ->get();
                }

                if($pays){
                    $bouteilles = DB::table('vino__cellier_has_vino__bouteille')
                    ->select('*')
                    ->join('vino__bouteille_personalize', 'vino__bouteille_id', '=', 'vino__bouteille_personalize.id')
                    ->join('vino__cellier', 'vino__cellier_id', '=', 'vino__cellier.id')
                    ->join('vino__note', 'vino__bouteille_id', '=', 'vino__note.id')
                    ->where('vino__cellier_id', $id)
                    ->where('pays', $pays)
                    ->orderBy('vino__bouteille_id', 'DESC')
                    ->get();
                }
            //dd($bouteilles);


            $pays = DB::table('vino__cellier_has_vino__bouteille')
                ->select('pays')
                ->join('vino__bouteille_personalize', 'vino__bouteille_id', '=', 'vino__bouteille_personalize.id')
                ->join('vino__cellier', 'vino__cellier_id', '=', 'vino__cellier.id')
                ->join('vino__note', 'vino__bouteille_id', '=', 'vino__note.id')
                ->where('vino__cellier_id', $id)
                ->groupBy('pays')
                ->get();
            //dd($pays);

        $cellier = Cellier::find($id);
        $titre = 'bouteille' ; 

        return view('bouteille.liste', [
            'bouteilles' => $bouteilles,
            'id_usager' => $id_usager,
            'id_cellier' => $id,
            'cellier' => $cellier,
            'msg'=> NULL,
            'titre' => $titre,
            'pays' => $pays

        ]);

        }else{

            return redirect('/login');
        }
    }

    /*
     Retourne pour ajouter une bouteille au cellier
    */
    public function nouveau(Request $request, $id)
    {
        if(Auth::check()){
            $id_usager = Auth::id();
        
            //Liste des bouteille  
            $bouteillesSAQ = DB::table('vino__bouteille')
            ->get();

            //cellier impliquer
            $cellier = Cellier::find($id);
            $titre = 'formBouteille';
            
            //vue des bouteille du catalogue
            return view('bouteille.nouveau', [
                'bouteillesSAQ' => $bouteillesSAQ, //pour la rechercher
                'cellier' => $cellier,
                'titre' => $titre,
                'id_cellier' => $id
            ]);
        }else{

            return redirect('/login');
        }
    }

    /*
     Création d'une bouteille dans la BD
    */
    public function creer(Request $request)
    {
        
        if(Auth::check()){
            
            $id_usager = Auth::id();
            $quantite = Request::get('quantite');
            $id_cellier = Request::get('id_cellier');
            $note = 0;

            
            
            //TODO validate data
            $this->validateBouteille($request);
            

            //dd($quantite);

            //Ajout de la bouteille dans vin personalize
            //TODO check duplication//
            $bouteille = BouteillePersonalize::create(Request::except(['quantite', 'id_cellier', 'millesime2' ]));

            //Ajout de la bouteille dans le cellier 
            $idBouteille = $bouteille->id;
            $request2 = [
                'vino__cellier_id'   => $id_cellier,
                'vino__bouteille_id' => $idBouteille,
                'quantite' => $quantite
            ];

            CelliersBouteilles::create($request2);


            //Ajout note 0 par défaut
            $request3 = [
                'id_usager'   => $id_usager,
                'note' => $note,
                'id_bouteille' => $idBouteille
            ];

            Note::create($request3);

            $titre = 'bouteille';

            $bouteilles = DB::table('vino__cellier_has_vino__bouteille')
                ->join('vino__bouteille_personalize', 'vino__bouteille_id', '=', 'vino__bouteille_personalize.id')
                ->join('vino__cellier', 'vino__cellier_id', '=', 'vino__cellier.id')
                ->join('vino__note', 'vino__bouteille_id', '=', 'vino__note.id')
                ->where('vino__cellier_id', $id_cellier)
                ->get();
        
            //Redirect vers la liste des bouteille du cellier avec un message de succès
            return redirect()
            ->route('bouteille.liste', [ 'id' => $id_cellier, 'titre' => $titre] )
            ->withSuccess('Vous avez ajouter la bouteille '.$bouteille->nom.'!');
       
        }else{

            return redirect('/login');
        }
    }


    /**
     * Edit bouteille
    */
    public function edit(Request $request, $idVin, $idCellier)
    {
      
        
        if(Auth::check()){

            $bouteille = BouteillePersonalize::findOrFail($idVin)
                                                ->select('*')
                                                ->join('vino__cellier_has_vino__bouteille', 'vino__bouteille_personalize.id', '=', 'vino__cellier_has_vino__bouteille.vino__bouteille_id')
                                                ->where('id', $idVin)
                                                ->first();
    

            $cellier = Cellier::find($idCellier);
            $titre = 'formBouteille';
            //dd($bouteille);

            return view('bouteille.edit', [
                'bouteille' => $bouteille,
                'cellier' => $cellier,
                'titre' => $titre,
                'id_cellier' => $idCellier
                
            ]);
        }else{

            return redirect('/login');
        }
    }

    /**
     * Update
     */
    public function update(Request $request, $idVin, $idCellier)
    {
        
        
        if(Auth::check()){
            
            $this->validateBouteille($request);

            $quantite = Request::get('quantite');
          

            $request = Request::except(['quantite', 'id_cellier', 'millesime2' ]);

            
            
           
            //dd($request);

            $bouteille = BouteillePersonalize::findOrFail($idVin)->update($request);
            //dd($bouteille);


            $request2 = [
                'idCellier'   => $idCellier,
                'idVin' => $idVin,
                'quantite' => $quantite
            ];

            $request3 = new Request;
            $request3::merge($request2);

            $this->quantite($request3);

            // Retourne au formulaire
            return redirect()
                ->route('bouteille.liste', [ 'id' => $idCellier] )
                ->withSuccess('La modification a réussi!');
            }else{

                return redirect('/login');
            }
    }


    /**
     * Supprime
     */
    public function supprime(Request $request, $idVin, $idCellier)
    {
        if(Auth::check()){
            $id =(int)$idVin;
            
            $bouteille = BouteillePersonalize::findOrFail($id);
            
            
            $bouteille->delete();


            // Retourne au formulaire
            return redirect()
                ->route('bouteille.liste', [ 'id' => $idCellier] )
                ->withSuccess("Vous avez supprimer la bouteille  {$bouteille->nom}  !");

        
        }else{

            return redirect('/login');
        }

    }

   /**
    * Fonction qui recherche des bouteilles du catalogue
    */
    public function recherche(Request $request)
    {
            
            $data = '';
            $recherche = Request::get('recherche');
           // dd($recherche);
         //Requete sur la recherche , limit de 10
            if($recherche != '')
            {
                $data = DB::table('vino__bouteille')
                ->where('nom','like','%' .$recherche. '%')
                ->take(10)
                ->get();
            }

            //dd('routerecherche');
            return json_encode($data);
    }



    /**
     * Fonction qui modifie la quantité de bouteille
     */
    public function quantite(Request $request)
    {
        //dd($request);
       
        $idVin = intval(Request::get('idVin'));
       //dd($idVin);
        $idCellier = Request::get('idCellier');
        $quantite = Request::get('quantite');
        //dd($idCellier, $idVin, $quantite);

        $updated = CelliersBouteilles::where('vino__bouteille_id', $idVin)
                                        ->limit(1)
                                        ->update(['quantite' => $quantite]); 

        
        //dd($updated);


       // return json_encode($quantite);

        // Redirect
        return redirect()
            ->route('bouteille.liste', [ 'id' => $idCellier] );
          
    }

    /**
     * Fonction qui modifie la note de la  bouteille
     */
    public function note(Request $request)
    {
        //dd($request);
       
        $idVin = intval(Request::get('idVin'));
       //dd($idVin);
        $idCellier = Request::get('idCellier');
        //dd($idCellier);
        $note = Request::get('note');
        //dd($idCellier, $idVin, $note);

        $updated = Note::where('id_bouteille', $idVin)
                                        ->limit(1)
                                        ->update(['note' =>$note]); 

        
        //dd($updated);


       // return json_encode($quantite);

        // Redirect
        return redirect()
            ->route('bouteille.liste', [ 'id' => $idCellier] );
          
    }


    /**
     * Fonction qui permet de valider les données de l'usager 
     */
    private function validateBouteille(Request $request)
    {
        
        return Request::validate([
            'nom' => 'required',
            'type' => 'required',
            'quantite' => 'required',
        ]);

         
    }

    
     /**
     * Fonction pour le rating des bouteilles
     */

    //  public function rating(Request $request)
    //  {
    //      $review = new ReviewRating();
    //      $review->note = $request->input('note');

    //      // Validate the data
    //      $validatedData = $request->validate([
    //          'note' => 'required|integer|between:1,5'
    //      ]);

    //      // Attempt to save the rating to the database
    //      try {
    //          $review->save();
    //          return response()->json(['message' => 'Rating saved successfully'], 201);
    //      } catch (\Exception $e) {
    //          // Handle the exception and return an error response
    //          return response()->json(['message' => 'Error saving the rating'], 500);
    //      }
    //  }



    
}
