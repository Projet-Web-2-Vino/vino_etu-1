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
     
        $users = User::get();
      
        return view('admin.index', [
            'users' => $users
        ]);
        return view('admin.index');
    }

    /**
     * Supprime
     */
    public function supprime(Request $request, $id)
    {
        //dd($id);
        $user = User::findOrFail($id);
        $user->delete();

        // Retourne au tableau admin
        return redirect()
            ->route('admin.index')
            ->withSuccess("Vous avez supprimer le user {$user->name} !");

    }

}
