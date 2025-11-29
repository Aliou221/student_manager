<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <title>@yield('title')</title>
</head>

<body class="flex flex-col min-h-screen bg-linear-to-b from-white to-gray-100">

  <header class="sticky top-0 z-50 bg-white/70 backdrop-blur-xl border-b border-gray-200/50">
    <nav class="flex items-center justify-between max-w-7xl mx-auto w-full px-6 py-4">

      <a href="{{ route('welcome') }}" class="flex items-center gap-3 font-semibold text-gray-800">
        <span class="size-10 p-2 bg-blue-50 text-blue-600 flex items-center justify-center rounded-md">
          <span>
            <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="none" stroke="currentColor" stroke-width="2"
              stroke-linecap="round" stroke-linejoin="round">
              <path
                d="M21.42 10.922a1 1 0 0 0-.019-1.838L12.83 5.18a2 2 0 0 0-1.66 0L2.6 9.08a1 1 0 0 0 0 1.832l8.57 3.908a2 2 0 0 0 1.66 0z">
              </path>
              <path d="M22 10v6"></path>
              <path d="M6 12.5V16a6 3 0 0 0 12 0v-3.5"></path>
            </svg>
          </span>
        </span>
        <span class="text-lg">Student Manager</span>
      </a>

      <ul class="flex items-center gap-4 text-gray-700 font-medium">
        <li>
          <a href="{{ route('welcome') }}"
            class="hover:text-blue-600 transition-colors px-3 py-2 {{ request()->routeIs('welcome') ? 'text-blue-600 font-bold bg-gray-50 rounded-md' : '' }}">
            Accueil
          </a>
        </li>
        <li>
          <a href="{{ route('filieres.index') }}"
            class="hover:text-blue-600 transition-colors px-3 py-2 {{ request()->routeIs('filieres.*') ? 'text-blue-600 font-bold bg-gray-50 rounded-md' : '' }}">
            Filières
          </a>
        </li>
        <li>
          <a href="{{ route('etudiants.index') }}"
            class="hover:text-blue-600 transition-colors px-3 py-2 {{ request()->routeIs('etudiants.*') ? 'text-blue-600 font-bold bg-gray-50 rounded-md' : '' }}">
            Étudiants
          </a>
        </li>
      </ul>

    </nav>
  </header>

  <main class="px-6 py-8 flex-1">
    <div class="max-w-7xl mx-auto w-full px-6 py-4">
      @yield('content')
    </div>
  </main>

  <footer class="bg-white/70 backdrop-blur-xl border-t border-gray-200/50 py-6 mt-10">
    <div class="max-w-7xl mx-auto w-full px-6 flex items-center justify-between text-gray-600">
      <p class="text-sm">&copy; {{ date('Y') }} Student Manager. Tous droits réservés.</p>
      <p class="text-sm flex items-center gap-1">Développé par

            <a href="https://github.com/Aliou221" target="_blank" class="flex items-center gap-1">
                <span class="font-semibold text-blue-600">Aliou CISSE</span>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-5">
                    <path d="M15 22v-4a4.8 4.8 0 0 0-1-3.5c3 0 6-2 6-5.5.08-1.25-.27-2.48-1-3.5.28-1.15.28-2.35 0-3.5 0 0-1 0-3 1.5-2.64-.5-5.36-.5-8 0C6 2 5 2 5 2c-.3 1.15-.3 2.35 0 3.5A5.403 5.403 0 0 0 4 9c0 3.5 3 5.5 6 5.5-.39.49-.68 1.05-.85 1.65-.17.6-.22 1.23-.15 1.85v4"/>
                    <path d="M9 18c-4.51 2-5-2-7-2"/>
                </svg>
            </a>
      </p>
    </div>
  </footer>

</body>

</html>
