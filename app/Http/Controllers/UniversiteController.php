<?php

namespace App\Http\Controllers;

use App\Models\Universite;
use Illuminate\Http\Request;

class UniversiteController extends Controller {

    public function index(Request $request) {
        $universites = Universite::query();

        if ($request->entreprise) {
            $universites = $universites->where('uo_lib', 'like', '%' . $request->entreprise . '%')->orWhere('etablissement_id_paysage', 'like', '%' . $request->entreprise . '%');
        }

        $universites = $universites->paginate(10);
        return view('listUniversite', compact('universites'));
    }

    public function show(Universite $universite){
        return view('detailUniversite', compact('universite'));
    }

}
