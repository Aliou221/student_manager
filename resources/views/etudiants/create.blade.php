@extends('layouts.app')

@section('title', 'Student Manager - Ajouter un étudiant')

@section('content')

    <section class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-xs">

        <h1 class="text-2xl font-bold text-gray-800 mb-6">
            Ajouter un étudiant
        </h1>

        <form action="{{ route('etudiants.store') }}" method="POST" class="space-y-5">
            @csrf

            <div class="flex gap-4 w-full">
                <div class="flex flex-col gap-2 flex-1">
                    <label for="nom" class="text-gray-700 font-medium text-sm">Nom complet</label>
                    <input type="text" name="nom" id="nom" placeholder="Ex : Aliou CISSE" class="border border-zinc-300 rounded-md mt-1 px-3 py-2">
                    @error('nom')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col gap-2 flex-1">
                    <label for="email" class="text-gray-700 font-medium text-sm">Email</label>
                    <input type="email" name="email" id="email" placeholder="Ex : aliou@example.com" class="border border-zinc-300 rounded-md mt-1 px-3 py-2">
                    @error('email')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex gap-3">
                <div class="flex flex-col gap-2">
                    <label for="date_naissance" class="text-gray-700 font-medium text-sm">Date de naissance</label>
                    <input type="date" name="date_naissance" id="date_naissance" class="border border-zinc-300 rounded-md mt-1 px-3 py-2">
                    @error('date_naissance')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col gap-2 flex-1">
                    <label for="filiere_id" class="text-gray-700 font-medium text-sm">Filière</label>
                    <select name="filiere_id" id="filiere_id" class="border border-zinc-300 rounded-md mt-1 px-3 py-2">
                        <option value="" hidden>-- Sélectionner une filière --</option>
                        @foreach ($filieres as $filiere)
                            <option value="{{ $filiere->id }}">{{ $filiere->nom }}</option>
                        @endforeach
                    </select>

                    @error('filiere_id')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex justify-end gap-2">
                <a href="{{ route('etudiants.index') }}" class="px-5 py-2 bg-gray-600 text-white font-medium rounded-lg shadow hover:bg-gray-700 transition">
                    Annuler
                </a>
                <button type="submit" class="px-5 py-2 bg-blue-600 text-white font-medium rounded-lg shadow hover:bg-blue-700 transition">
                    Enregistrer
                </button>
            </div>
        </form>
    </section>
@endsection
