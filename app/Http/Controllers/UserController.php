<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offre; 

class UserController extends Controller
{
    public function homepage() {
        return view('homepage');
    }

    public function offres() {

        $offres=Offre::all();

        return view('offres', compact('offres'));

    }
}
