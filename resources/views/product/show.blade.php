
@extends('layouts.app')
@section('content')
  <div class="grid md:grid-cols-2 gap-8">
    <img src="{{ $product->image_url }}" class="rounded-2xl w-full border" alt="{{ $product->name }}">
    <div>
      <h1 class="text-3xl font-bold">{{ $product->name }}</h1>
      <div class="text-stone-600">{{ optional($product->category)->name }} · {{ $product->volume_ml }} ml</div>
      <div class="text-2xl font-semibold mt-2">{{ number_format($product->price_cfa,0,' ',' ') }} FCFA</div>
      <p class="mt-4">{{ $product->description }}</p>
      <ul class="mt-4 text-sm text-stone-700 list-disc pl-5">
        @if($product->origins)<li>Origines : {{ $product->origins }}</li>@endif
        @if($product->fabrication)<li>Fabrication : {{ $product->fabrication }}</li>@endif
      </ul>

      <form action="{{ route('panier.add', $product->id) }}" method="POST" class="mt-6">@csrf
        <label class="text-sm">Quantité</label>
        <input type="number" name="qty" value="1" min="1" class="border rounded-xl p-2 w-24 ml-2">
        <button class="ml-3 px-4 py-2 bg-amber-600 text-white rounded-xl">Ajouter au panier</button>
      </form>
    </div>
  </div>
@endsection
