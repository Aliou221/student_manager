@extends('layouts.app')

@section('title', 'Student Manager - Filières')

@section('content')
    <section class="my-6">

        @if (session('success'))
            <p class="p-4 rounded-lg bg-green-100 text-sm font-medium text-green-700 border border-green-300 my-5">
                {{ session('success') }}
            </p>
        @endif

        @if (session('failed'))
            <p class="p-4 rounded-lg bg-red-100 text-sm font-medium text-red-700 border border-red-300 my-5">
                {{ session('failed') }}
            </p>
        @endif

        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Liste des filières</h1>

            <a href="{{ route('filieres.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
                Ajouter une filière
            </a>
        </div>

        <div class="bg-white shadow rounded-lg overflow-hidden">
            <table class="min-w-full border-collapse">
                <thead class="bg-gray-100">
                    <tr class="text-left text-gray-600 text-sm uppercase tracking-wide">
                        <th class="px-6 py-3">ID</th>
                        <th class="px-6 py-3">Nom</th>
                        <th class="px-6 py-3">Effectif</th>
                        <th class="px-6 py-3 text-center">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200 text-gray-700">
                    @foreach ($filieres as $filiere)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 font-medium">
                                {{ $filiere->id }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $filiere->nom }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $filiere->nbr_etudiant }}
                            </td>

                            <td class="px-6 py-4">
                            <div class="flex items-center justify-center gap-3">
                                <form action="{{ route('filieres.destroy', $filiere->id) }}" method="POST">
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
        </div>
    </section>
@endsection
