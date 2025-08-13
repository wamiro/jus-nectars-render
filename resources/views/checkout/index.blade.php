
@extends('layouts.app')
@section('content')
  <h1 class="text-3xl font-bold mb-6">Finaliser la commande</h1>
  <div class="grid md:grid-cols-3 gap-6">
    <form action="{{ route('commande.store') }}" method="POST" class="bg-white border rounded-2xl p-4 md:col-span-2">@csrf
      <div class="grid md:grid-cols-2 gap-4">
        <div><label class="text-sm">Nom complet</label><input name="customer_name" class="w-full border rounded-xl p-2"></div>
        <div><label class="text-sm">E-mail</label><input name="customer_email" type="email" class="w-full border rounded-xl p-2"></div>
        <div><label class="text-sm">Adresse</label><input name="address" class="w-full border rounded-xl p-2"></div>
        <div><label class="text-sm">Ville</label><input name="city" class="w-full border rounded-xl p-2"></div>
        <div class="md:col-span-2"><label class="text-sm">Notes</label><textarea name="notes" class="w-full border rounded-xl p-2"></textarea></div>
      </div>
      <button class="mt-4 px-4 py-2 bg-amber-600 text-white rounded-xl">Confirmer la commande</button>
    </form>
    <div class="bg-white border rounded-2xl p-4">
      <div class="font-semibold mb-2">Récapitulatif</div>
      <div class="flex justify-between"><span>Sous-total</span><span>{{ number_format($total,0,' ',' ') }} FCFA</span></div>
      <div class="flex justify-between"><span>Livraison</span><span>{{ number_format($shipping,0,' ',' ') }} FCFA</span></div>
      <div class="flex justify-between font-semibold text-lg border-t mt-2 pt-2"><span>Total TTC</span><span>{{ number_format($ttc,0,' ',' ') }} FCFA</span></div>
    </div>
  </div>
@endsection
