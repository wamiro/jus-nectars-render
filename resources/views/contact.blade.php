
@extends('layouts.app')
@section('content')
<h1 class="text-3xl font-bold mb-4">Contact</h1>
<form action="{{ route('contact.send') }}" method="POST" class="bg-white border rounded-2xl p-4 max-w-xl">@csrf
  <div class="mb-3"><label class="text-sm">Nom</label><input name="name" class="w-full border rounded-xl p-2"></div>
  <div class="mb-3"><label class="text-sm">Email</label><input name="email" type="email" class="w-full border rounded-xl p-2"></div>
  <div class="mb-3"><label class="text-sm">Message</label><textarea name="message" class="w-full border rounded-xl p-2"></textarea></div>
  <button class="px-4 py-2 bg-amber-600 text-white rounded-xl">Envoyer</button>
</form>

<div class="mt-8">
  <h2 class="text-xl font-semibold mb-2">Localisation</h2>
  <div class="aspect-video">
    <iframe class="w-full h-80 rounded-2xl border" src="https://www.openstreetmap.org/export/embed.html?bbox=9.68,3.82,13.52,6.92&amp;layer=mapnik" loading="lazy"></iframe>
  </div>
</div>
@endsection
