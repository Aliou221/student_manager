@extends('layouts.app')

@section('title', 'Student Manager - Etudiants')

@section('content')
    <section class="my-6">
        <div class="bg-white px-5 py-2 my-4 rounded-lg shadow-xs">
            <h3 class="text-lg font-semibold">Recherche des étudiants</h3>

            <form action="" method="GET" class="flex flex-col gap-2">
                <div class="grid grid-cols-3 gap-5">

                    <div class="flex flex-col mt-3">
                        <label for="nom" class="text-sm">Nom complet</label>
                        <input type="text" name="nom" id="nom" value="{{ request('nom') }}" placeholder="Rechercher par nom" class="border text-sm border-zinc-300 rounded-md mt-1 px-3 py-2">
                    </div>

                    <div class="flex flex-col mt-3">
                        <label for="email" class="text-sm">Email</label>
                        <input type="email" name="email" id="email" value="{{ request('email') }}" placeholder="Rechercher par email" class="border text-sm border-zinc-300 rounded-md mt-1 px-3 py-2">
                    </div>

                    <div class="flex flex-col mt-3">
                        <label for="filiere_id" class="text-sm">Filière</label>
                        <select name="filiere_id" id="filiere_id" class="border text-sm border-zinc-300 rounded-md mt-1 px-3 py-2">
                            <option value="" hidden>-- Sélectionner une filière --</option>
                            @foreach ($filieres as $filiere)
                                <option value="{{ $filiere->id }}" {{ request('filiere_id') == $filiere->id ? 'selected' : '' }}>
                                    {{ $filiere->nom }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="flex flex-col">
                    <h3 class="text-sm text-gray-500 font-semibold my-3">Rechercher par date de naissance</h3>
                    <div class="flex gap-4">
                        <div class="flex flex-col">
                            <label for="date_min" class="text-sm">Date debut</label>
                            <input type="date" name="date_min" id="date_min" value="{{ request('date_min') }}" class="border text-sm border-zinc-300 rounded-md mt-1 px-3 py-2">
                        </div >
                        <div class="flex flex-col">
                            <label for="date_max" class="text-sm">Date fin</label>
                            <input type="date" name="date_max" id="date_max" value="{{ request('date_max') }}" class="border text-sm border-zinc-300 rounded-md mt-1 px-3 py-2">
                        </div>
                    </div>
                </div>

                <div class="flex gap-4">
                    <input type="submit" value="Rechercher" class="bg-blue-600 px-3 py-2 rounded-lg cursor-pointer my-3 self-start text-white hover:bg-blue-700">
                    <a href="{{ route('etudiants.index') }}" class="bg-gray-600 px-3 py-2 rounded-lg cursor-pointer my-3 self-start text-white hover:bg-gray-700">
                        Reinitialiser
                    </a>
                </div>

            </form>
        </div>
        @if (session('success'))
            <p class="p-4 rounded-lg bg-green-100 text-sm font-medium text-green-700 border border-green-300 my-5">
                {{ session('success') }}
            </p>
        @endif

        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Liste des étudiants</h1>

            <a href="{{ route('etudiants.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
                Ajouter un étudiant
            </a>
        </div>

        <div class="bg-white shadow rounded-lg overflow-hidden">

            <table class="min-w-full border-collapse">
                <thead class="bg-gray-100">
                    <tr class="text-left text-gray-600 text-sm uppercase tracking-wide">
                        <th class="px-6 py-3">ID</th>
                        <th class="px-6 py-3">Nom</th>
                        <th class="px-6 py-3">Email</th>
                        <th class="px-6 py-3">Date de Naissance</th>
                        <th class="px-6 py-3">Filière</th>
                        <th class="px-6 py-3 text-center">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200 text-gray-700">
                    @foreach ($etudiants as $etudiant)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 font-medium">
                                {{ $etudiant->id }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $etudiant->nom }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $etudiant->email }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $etudiant->date_naissance }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $etudiant->filiere->nom }}
                            </td>

                            <td class="px-6 py-4">
                            <div class="flex items-center justify-center gap-3">
                                <form action="{{ route('etudiants.destroy', $etudiant->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button onclick="return confirm('Voulez vous vraiment supprimer cette filière ?')" class="text-white cursor-pointer bg-linear-to-br from-red-800 to-red-600 size-8 p-1 rounded-md flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-5">
                                            <path d="M10 11v6"/>
                                            <path d="M14 11v6"/>
                                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"/>
                                            <path d="M3 6h18"/>
                                            <path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="p-3 text-sm">
                {{ $etudiants->links() }}
            </div>
        </div>
    </section>
@endsection
