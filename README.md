# TP Laravel – Évaluation 3h
## Objectif général
Développer une mini-application Laravel intitulée “Student Manager”, permettant de gérer
des filières et des étudiants.

## Consignes générales
-    Durée : 3 heures
-    Framework : Laravel 10+
-    Base de données : MySQL
-    Le rendu doit inclure : migrations, modèles, relations, contrôleurs, vues Blade, validation, CRUD complet, layout général.

### 1. Mise en place du projet
-   Créer un projet Laravel : laravel new student_manager
-   Configurer la base MySQL dans .env.

### 2. Migrations + Modèles
    Tables    : filieres(id, nom, timestamps) et etudiants(id, nom, email, date_naissance, filiere_id, timestamps).
    Relations : Une filière a plusieurs étudiants ; un étudiant appartient à une filière.

### 3. Contrôleurs
Créer FiliereController et EtudiantController avec : index, create, store, destroy.

### 4. Fonctionnalités
    A. Gestion des filières : liste, création, suppression (interdite si étudiants présents).
    B. Gestion des étudiants : liste, création, suppression.

### 5. Layout Blade
Créer layouts/app.blade.php avec header, menu, footer et @yield('content').

### 6. Routes
    Route::resource('filieres', FiliereController::class)->except(['show','edit','update']);
    Route::resource('etudiants', EtudiantController::class)->except(['show','edit','update']);

### Bonus avancé : Recherche des étudiants
Créer une recherche avancée multi-critères : nom, email, filière, date de naissance (intervalle).
Résultats paginés, recherche globale optionnelle.
### Barème
Migrations+modèles:4, Relations:2, Contrôleurs:4, CRUD Filières:3, CRUD Étudiants:4,
Layout:2, Bonus:1.

