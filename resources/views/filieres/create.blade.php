@extends('layouts.app')

@section('title', 'Student Manager - Ajouter une filière')

@section('content')

    <section class="my-10 max-w-lg mx-auto bg-white p-8 rounded-lg shadow-xs">

        <h1 class="text-2xl font-bold text-gray-800 mb-6">
            Ajouter une filière
        </h1>

        <form action="{{ route('filieres.store') }}" method="POST" class="space-y-5">
            @csrf

            <div class="flex flex-col gap-2">
                <label for="nom" class="text-gray-700 font-medium text-sm">Nom de la filière</label>
                <input type="text" name="nom" id="nom"  placeholder="Ex: Informatique" class="border border-zinc-300 rounded-md mt-1 px-3 py-2">
                @error('nom')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end gap-2">
                <a href="{{  route('filieres.index') }}" type="submit" class="px-5 py-2 bg-gray-600 cursor-pointer text-white font-medium rounded-lg shadow hover:bg-gray-700 transition">
                    Annuler
                </a>
                <button type="submit" class="px-5 py-2 bg-blue-600 cursor-pointer text-white font-medium rounded-lg shadow hover:bg-blue-700 transition">
                    Enregistrer
                </button>
            </div>
        </form>
    </section>
@endsection
