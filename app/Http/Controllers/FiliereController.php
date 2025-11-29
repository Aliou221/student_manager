<?php

namespace App\Http\Controllers;

use App\Models\Filiere;
use Illuminate\Http\Request;

class FiliereController extends Controller
{
    public function index()
    {
        $filieres = Filiere::withCount('etudiants as nbr_etudiant')->get();
        return view('filieres.index', compact('filieres'));
    }

    public function create()
    {
        return view('filieres.create');
    }

    public function store(Request $request)
    {
        $filiere = $request->validate([
            'nom' => "required"
        ],[
            'nom.required' => "Le nom de la filière est obligatoire."
        ]);

        Filiere::create($filiere);

        return redirect()->route('filieres.index')->with('success', 'La filière a été ajouté avec succès.');
    }

    public function destroy(Filiere $filiere)
    {
        if($filiere->has('etudiants')){
            return redirect()->back()->with('failed', 'Il existe de etudiants dans cette fiière');
        }else{
            $filiere->delete();
            return redirect()->back()->with('success', 'La filière a été supprimé avec succeès !');
        }
    }
}
