<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show(){ return view('contact'); }

    public function send(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string|max:3000',
        ]);
        // Demo: log only (configure real email later)
        \Log::info('Contact message', $data);
        return back()->with('ok', 'Merci ! Votre message a bien été envoyé.');
    }
}