<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RechercheController extends Controller
{
public function recherche(Request $request)
    {
            
            $data = '';
            $recherche = $request->get('recherche');
            dd('recherche');
            if($recherche != '')
            {
                $data = DB::table('vino__bouteille')
                ->where('nom','like','%' .$recherche. '%')
                ->get();
            }
           
            if ($request->ajax()) {
                return response()->json($data);
            }
        
            return view('recherche.recherche', [
               'data' => $data
            ]);

            //return json_encode($data);
    }

}