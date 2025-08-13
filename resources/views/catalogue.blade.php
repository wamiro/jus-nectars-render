
@extends('layouts.app')
@section('content')
  <h1 class="text-3xl font-bold mb-6">Catalogue</h1>

  <form method="GET" class="grid md:grid-cols-4 gap-4 bg-white border rounded-2xl p-4 mb-6">
    <select name="type" class="border rounded-xl p-2">
      <option value="">Type</option>
      <option value="jus" @selected(request('type')=='jus')>Jus</option>
      <option value="nectar" @selected(request('type')=='nectar')>Nectars</option>
      <option value="the_glace" @selected(request('type')=='the_glace')>Thés glacés</option>
    </select>
    <select name="range" class="border rounded-xl p-2">
      <option value="">Gamme</option>
      <option value="classique" @selected(request('range')=='classique')>Classique</option>
      <option value="premium" @selected(request('range')=='premium')>Premium</option>
      <option value="bio" @selected(request('range')=='bio')>Bio</option>
    </select>
    <select name="occasion" class="border rounded-xl p-2">
      <option value="">Occasion</option>
      <option value="degustation" @selected(request('occasion')=='degustation')>Dégustation</option>
      <option value="traiteur" @selected(request('occasion')=='traiteur')>Traiteur</option>
      <option value="epicerie" @selected(request('occasion')=='epicerie')>Épicerie</option>
    </select>
    <select name="volume" class="border rounded-xl p-2">
      <option value="">Contenance</option>
      <option value="330" @selected(request('volume')=='330')>330 ml</option>
      <option value="500" @selected(request('volume')=='500')>500 ml</option>
    </select>
    <div class="md:col-span-4 flex gap-3">
      <button class="px-4 py-2 bg-amber-600 text-white rounded-xl">Filtrer</button>
      <a href="{{ route('catalogue') }}" class="px-4 py-2 border rounded-xl">Réinitialiser</a>
    </div>
  </form>

  <div class="grid md:grid-cols-3 gap-6">
    @foreach($products as $p)
      <div class="bg-white rounded-2xl overflow-hidden border hover:shadow flex flex-col">
        <img src="{{ $p->image_url }}" alt="{{ $p->name }}" class="w-full h-44 object-cover">
        <div class="p-4 flex-1">
          <div class="text-xs text-stone-500">{{ optional($p->category)->name }}</div>
          <div class="font-semibold">{{ $p->name }}</div>
          <div class="text-sm text-stone-600">{{ number_format($p->price_cfa,0,' ',' ') }} FCFA · {{ $p->volume_ml }} ml</div>
        </div>
        <div class="p-4 border-t flex items-center justify-between">
          <a href="{{ route('produit.show', $p->slug) }}" class="text-amber-700 hover:underline">Voir</a>
          <form action="{{ route('panier.add', $p->id) }}" method="POST">@csrf
            <input type="hidden" name="qty" value="1">
            <button class="px-3 py-1.5 bg-amber-600 text-white rounded-xl">Ajouter</button>
          </form>
        </div>
      </div>
    @endforeach
  </div>

  <div class="mt-6">{{ $products->links() }}</div>
@endsection
