
@extends('layouts.app')
@section('content')
  <h1 class="text-3xl font-bold mb-6">Votre panier</h1>
  @if(empty($cart))
    <p>Votre panier est vide.</p>
  @else
  <div class="grid md:grid-cols-3 gap-6">
    <div class="md:col-span-2 bg-white border rounded-2xl">
      <table class="w-full text-sm">
        <thead class="bg-stone-50">
          <tr><th class="text-left p-3">Produit</th><th>Qté</th><th>Prix</th><th></th></tr>
        </thead>
        <tbody>
          @foreach($cart as $id=>$item)
          <tr class="border-t">
            <td class="p-3 flex items-center gap-3">
              <img src="{{ $item['image_url'] }}" class="w-16 h-16 object-cover rounded-md border">
              <a href="{{ route('produit.show', $item['slug']) }}" class="font-semibold hover:underline">{{ $item['name'] }}</a>
            </td>
            <td class="text-center">{{ $item['qty'] }}</td>
            <td class="text-center">{{ number_format($item['price_cfa']*$item['qty'],0,' ',' ') }} FCFA</td>
            <td class="text-right p-3">
              <form action="{{ route('panier.remove', $id) }}" method="POST">@csrf
                <button class="text-red-600 hover:underline">Retirer</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div>
      <div class="bg-white border rounded-2xl p-4">
        <div class="flex justify-between"><span>Sous-total</span><span>{{ number_format($total,0,' ',' ') }} FCFA</span></div>
        <div class="flex justify-between"><span>Livraison</span><span>{{ number_format($shipping,0,' ',' ') }} FCFA</span></div>
        <div class="flex justify-between font-semibold text-lg border-t mt-2 pt-2"><span>Total TTC</span><span>{{ number_format($ttc,0,' ',' ') }} FCFA</span></div>
        <a href="{{ route('commande.index') }}" class="block mt-4 text-center px-4 py-2 bg-amber-600 text-white rounded-xl">Commander</a>
        <form action="{{ route('panier.clear') }}" method="POST" class="mt-3">@csrf
          <button class="text-sm text-stone-600 hover:underline">Vider le panier</button>
        </form>
      </div>
    </div>
  </div>
  @endif
@endsection
