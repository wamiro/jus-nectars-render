
@extends('layouts.app')
@section('content')
  <section class="grid md:grid-cols-2 gap-8 items-center">
    <div>
      <h1 class="text-4xl font-extrabold leading-tight">Des jus et nectars <span class="text-amber-700">authentiques</span> & <span class="text-green-700">locaux</span></h1>
      <p class="mt-4 text-stone-700">Fabrication artisanale, extraction à froid et ingrédients du terroir. Pour particuliers et professionnels.</p>
      <div class="mt-6 flex gap-3">
        <a href="{{ route('catalogue') }}" class="px-4 py-2 bg-amber-600 text-white rounded-xl hover:bg-amber-700">Explorer le catalogue</a>
        <a href="{{ route('pages.engagements') }}" class="px-4 py-2 border rounded-xl hover:bg-stone-100">Nos engagements</a>
      </div>
    </div>
    <img src="https://picsum.photos/seed/jus/900/600" class="rounded-2xl shadow w-full" alt="Jus et Nectars" />
  </section>

  <section class="mt-12">
    <h2 class="text-2xl font-bold mb-4">Produits phares</h2>
    <div class="grid md:grid-cols-3 gap-6">
      @foreach($featured as $p)
      <a href="{{ route('produit.show', $p->slug) }}" class="bg-white rounded-2xl overflow-hidden border hover:shadow">
        <img src="{{ $p->image_url }}" alt="{{ $p->name }}" class="w-full h-44 object-cover">
        <div class="p-4">
          <div class="font-semibold">{{ $p->name }}</div>
          <div class="text-sm text-stone-600">{{ number_format($p->price_cfa,0,' ',' ') }} FCFA</div>
        </div>
      </a>
      @endforeach
    </div>
  </section>

  <section class="mt-12">
    <h2 class="text-2xl font-bold mb-4">Actualités</h2>
    <div class="grid md:grid-cols-2 gap-4">
      @foreach($news as $n)
        <div class="bg-white border rounded-2xl p-4">
          <div class="text-xs text-stone-500">{{ $n['date'] }}</div>
          <div class="font-semibold">{{ $n['title'] }}</div>
        </div>
      @endforeach
    </div>
  </section>
@endsection
