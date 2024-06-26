<?php

// Improved code
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mail;

class MailController extends Controller
{
    public function index()
    {
        return view('kontak', [
            'title' => 'KONTAK',
        ]);
    }
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'subject' => 'required|string',
        ]);

        Mail::create($validatedData);


        return redirect('/')->with('success', 'Pesan Anda Telah  Dikirimkan! tunggu kami melalui email yang telah anda kirimkan');
    }
}

