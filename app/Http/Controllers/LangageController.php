<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class LangageController extends Controller
{
    public function changeLang($lang)
    {
        if(array_key_exists($lang, Config::get('langages')))
        {
            Session::put('applocale',$lang);
        }
        return Redirect::back();
    }
}
