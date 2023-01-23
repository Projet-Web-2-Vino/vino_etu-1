<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(Request $request)
    {
       /* TODO Ajouter where id_usager dans where
        ex: $celliers = Cellier::where('id_usager', $id_usager)->get();*/
     
        $users = User::get();
      
        return view('admin.index', [
            'users' => $users
           
        ]);
        return view('admin.index');
    }
}
