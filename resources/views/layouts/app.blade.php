
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>{{ config('app.name','Jus & Nectars') }}</title>
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-stone-50 text-stone-800">
  <header class="bg-white/90 backdrop-blur sticky top-0 z-30 border-b">
    <div class="max-w-6xl mx-auto px-4 py-3 flex items-center justify-between">
      <a href="{{ route('home') }}" class="text-xl font-bold">
        <span class="text-amber-600">Jus</span> & <span class="text-green-600">Nectars</span>
      </a>
      <nav class="flex gap-6 text-sm">
        <a href="{{ route('catalogue') }}" class="hover:text-amber-700">Catalogue</a>
        <a href="{{ route('pages.histoire') }}" class="hover:text-amber-700">Histoire</a>
        <a href="{{ route('pages.fabrication') }}" class="hover:text-amber-700">Fabrication</a>
        <a href="{{ route('pages.engagements') }}" class="hover:text-amber-700">Engagements</a>
        <a href="{{ route('pages.faq') }}" class="hover:text-amber-700">FAQ</a>
        <a href="{{ route('contact.show') }}" class="hover:text-amber-700">Contact</a>
      </nav>
      <a href="{{ route('panier.index') }}" class="inline-flex items-center gap-2 px-3 py-1.5 rounded-xl bg-amber-600 text-white hover:bg-amber-700">
        🛒 Panier
        @php $count = collect(session('cart',[]))->sum('qty'); @endphp
        <span class="text-xs bg-white/20 rounded px-2 py-0.5">{{ $count }}</span>
      </a>
    </div>
  </header>

  @if(session('ok'))
    <div class="bg-green-100 text-green-800 px-4 py-2 text-sm">{{ session('ok') }}</div>
  @endif

  <main class="max-w-6xl mx-auto px-4 py-8">
    @yield('content')
  </main>

  <footer class="border-t bg-white">
    <div class="max-w-6xl mx-auto px-4 py-8 grid md:grid-cols-3 gap-6 text-sm">
      <div>
        <h4 class="font-semibold mb-2">À propos</h4>
        <p>Maison artisanale de jus et nectars de fruits du terroir. Qualité, naturalité et proximité.</p>
      </div>
      <div>
        <h4 class="font-semibold mb-2">Catégories</h4>
        <ul class="space-y-1">
          <li><a href="{{ url('/catalogue?type=jus') }}" class="hover:text-amber-700">Jus</a></li>
          <li><a href="{{ url('/catalogue?type=nectar') }}" class="hover:text-amber-700">Nectars</a></li>
          <li><a href="{{ url('/catalogue?type=the_glace') }}" class="hover:text-amber-700">Thés glacés</a></li>
        </ul>
      </div>
      <div>
        <h4 class="font-semibold mb-2">Suivez-nous</h4>
        <div class="flex gap-3">
          <a href="#" class="hover:text-amber-700">Instagram</a>
          <a href="#" class="hover:text-amber-700">Facebook</a>
        </div>
      </div>
    </div>
    <div class="text-center text-xs text-stone-500 pb-6">© {{ date('Y') }} Jus & Nectars</div>
  </footer>
</body>
</html>
