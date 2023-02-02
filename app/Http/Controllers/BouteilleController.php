<?php

namespace App\Http\Controllers;


use App\Models\Bouteille;
use App\Models\BouteillePersonalize;
use App\Models\Cellier;
use App\Models\CelliersBouteilles;


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

        Auth::check();
        $id_usager = Auth::id();

        $bouteilles = DB::table('vino__cellier_has_vino__bouteille')
            ->select('*')
            ->join('vino__bouteille_personalize', 'vino__bouteille_id', '=', 'vino__bouteille_personalize.id')
            ->join('vino__cellier', 'vino__cellier_id', '=', 'vino__cellier.id')
            ->where('vino__cellier_id', $id)
            ->get();

        //dd($bouteilles);

       $cellier = Cellier::find($id);





        //dd($bouteilles);


        return view('bouteille.liste', [
            'bouteilles' => $bouteilles,
            'id_usager' => $id_usager,
            'id_cellier' => $id,
            'cellier' => $cellier,
            'msg'=> NULL
        ]);
    }

    /*
     Retourne la vue pour catalogue
    */
    public function nouveau(Request $request, $id)
    {
        Auth::check();
        $id_usager = Auth::id();

        //Liste des bouteille
         $bouteillesSAQ = DB::table('vino__bouteille')
         ->get();

        //cellier impliquer
        $cellier = Cellier::find($id);

        //vue des bouteille du catalogue
        return view('bouteille.nouveau', [
            'bouteillesSAQ' => $bouteillesSAQ, //pour la rechercher
            'cellier' => $cellier
        ]);
    }

    /*
     Création d'une bouteille dans la BD
    */
    public function creer(Request $request)
    {
        Auth::check();
        $id_usager = Auth::id();

        //TODO validate data
        //$this->validateBouteille($request);

        $quantite = Request::get('quantite');
        $id_cellier = Request::get('id_cellier');

        //dd($quantite);

        //Ajout de la bouteille dans vin personalize
        //TODO check duplication//
        $bouteille = BouteillePersonalize::create(Request::except(['quantite', 'id_cellier']));

        //Ajout de la bouteille dans le cellier
        $idBouteille = $bouteille->id;
        $request2 = [
            'vino__cellier_id'   => $id_cellier,
            'vino__bouteille_id' => $idBouteille,
            'quantite' => $quantite
        ];

        CelliersBouteilles::create($request2);

        $bouteilles = DB::table('vino__cellier_has_vino__bouteille')
            ->join('vino__bouteille_personalize', 'vino__bouteille_id', '=', 'vino__bouteille_personalize.id')
            ->join('vino__cellier', 'vino__cellier_id', '=', 'vino__cellier.id')
            ->where('vino__cellier_id', $id_cellier)
            ->get();

        //Redirect vers la liste des bouteille du cellier avec un message de succès
        return redirect()
        ->route('bouteille.liste', [ 'id' => $id_cellier] )
        ->withSuccess('Vous avez ajouter la bouteille '.$bouteille->nom.'!');

    }


    /**
     * Edit bouteille
    */
    public function edit(Request $request, $idVin, $idCellier)
    {


       //dd($id);

        $bouteille = BouteillePersonalize::findOrFail($idVin)
                                            ->select('*')
                                            ->join('vino__cellier_has_vino__bouteille', 'vino__bouteille_personalize.id', '=', 'vino__cellier_has_vino__bouteille.vino__bouteille_id')
                                            ->where('id', $idVin)
                                            ->first();


       $cellier = Cellier::find($idCellier);

        //dd($bouteille);

            return view('bouteille.edit', [
                'bouteille' => $bouteille,
                'cellier' => $cellier

            ]);
    }

    /**
     * Update
     */
    public function update(Request $request, $idVin, $idCellier)
    {
        //dd($id);
        $this->validateBouteille($request);
        $request = Request::all();

        $bouteille = BouteillePersonalize::findOrFail($idVin)->update($request);
        //dd($bouteille);



        // Retourne au formulaire
        return redirect()
            ->route('bouteille.liste', [ 'id' => $idCellier] )
            ->withSuccess('La modification a réussi!');
    }


    /**
     * Supprime
     */
    public function supprime(Request $request, $idVin, $idCellier)
    {
        //dd($idVin);
        $id =(int)$idVin;
        // TODO lier usager à ses bouteille...
        $bouteille = BouteillePersonalize::findOrFail($id);


        $bouteille->delete();

        //--------TODO

        /*supprimer bouteille/ceillier
        /* model=CelliersBouteilles

        --------------*/

        // Retourne au formulaire
        return redirect()
            ->route('bouteille.liste', [ 'id' => $idCellier] )
            ->withSuccess("Vous avez supprimer la bouteille  {$bouteille->nom}  !");




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


        $idVin = intval(Request::get('idVin'));
       //dd($idVin);
        $idCellier = Request::get('idCellier');
        $quantite = Request::get('quantite');
    dd($idCellier, $idVin, $quantite);

        $updated = CelliersBouteilles::where('vino__bouteille_id', $idVin)
                                        ->limit(1)
                                        ->update(['quantite' => $quantite]);


        dd($updated);


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
        Request::validate([
            'nom' => 'required',
            'type' => 'required'
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
