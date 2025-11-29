@extends('layouts.app')

@section('title', 'Student Manager - Accueil')

@section('content')
<section class="my-10">
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Tableau de bord</h1>

        <div class="flex gap-4">
            <a href="{{ route('filieres.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
                Ajouter une filière
            </a>
            <a href="{{ route('etudiants.create') }}" class="px-4 py-2 bg-green-600 text-white rounded-lg shadow hover:bg-green-700 transition">
                Ajouter un étudiant
            </a>
        </div>
    </div>

    <div class="grid md:grid-cols-2 gap-8">

        <div class="bg-white p-6 rounded-xl shadow-xs hover:shadow-lg cursor-pointer transition transform hover:-translate-y-1">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-medium text-gray-600">Filières</h3>
                <div class="w-10 h-10 bg-blue-100 text-blue-600 flex items-center justify-center rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-book-marked-icon lucide-book-marked">
                        <path d="M10 2v8l3-3 3 3V2"/>
                        <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H19a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20"/>
                    </svg>
                </div>
            </div>
            <p class="text-4xl font-bold mt-4">
                {{ $nbFilieres }}
            </p>
            <p class="text-sm text-gray-500 mt-1">Total disponibles</p>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-xs hover:shadow-lg cursor-pointer transition transform hover:-translate-y-1">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-medium text-gray-600">Étudiants</h3>
                <div class="w-10 h-10 bg-green-100 text-green-600 flex items-center justify-center rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users-icon lucide-users">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                        <path d="M16 3.128a4 4 0 0 1 0 7.744"/>
                        <path d="M22 21v-2a4 4 0 0 0-3-3.87"/>
                        <circle cx="9" cy="7" r="4"/>
                    </svg>
                </div>
            </div>
            <p class="text-4xl font-bold mt-4">
                {{ $nbEtudiants }}
            </p>
            <p class="text-sm text-gray-500 mt-1">Inscrits</p>
        </div>
    </div>
</section>
@endsection
