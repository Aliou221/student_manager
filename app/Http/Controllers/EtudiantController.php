<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Filiere;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    public function search($query, $col, $op, $search)
    {
        if($search){
            if($op === "LIKE"){
                $query->where($col, $op, "%$search%");
            }else{
                $query->where($col, $op, $search);
            }
        }
    }
    public function index(Request $request)
    {
        $name = $request->nom;
        $email = $request->email;
        $filiere_id = $request->filiere_id;
        $date_min = $request->date_min;
        $date_max = $request->date_max;

        $query = Etudiant::with('filiere');

        // Nom et Email
        $this->search($query, 'nom', 'LIKE', $name);
        $this->search($query, 'email', 'LIKE', $email);

        // filiere
        $this->search($query, 'filiere_id', '=', $filiere_id);

        // Serch Date de naissance
        $this->search($query, 'date_naissance', '>=', $date_min);
        $this->search($query, 'date_naissance', '<=', $date_max);

        $etudiants = $query->paginate(perPage: 4);

        $filieres = Filiere::all();
        return view('etudiants.index', compact('etudiants', 'filieres'));
    }

    public function create()
    {
        $filieres = Filiere::all();
        return view('etudiants.create', compact( 'filieres'));
    }

    public function store(Request $request)
    {
        $etudiant = $request->validate([
            'nom' => 'required',
            'email' => 'required',
            'date_naissance' => 'required',
            'filiere_id' => 'required',
        ], [
            'nom.required' => 'Le nom est obligatoire.',
            'email.required' => "L'adresse email est obligatoire.",
            'date_naissance.required' => 'La date de naissance est obligatoire.',
            'filiere_id.required' => 'La filière est obligatoire.',
        ]);

        Etudiant::create($etudiant);

        return redirect()->route('etudiants.index')->with('success', $etudiant['nom']. ' a été ajouté avec succès!');
    }

    public function destroy(Etudiant $etudiant)
    {
        $etudiant->delete();
        return redirect()->back()->with('success', $etudiant->nom . ' a été supprimé avec succeès !');
    }
}
