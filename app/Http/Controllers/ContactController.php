<?php

namespace App\Http\Controllers;

use App\Mail\UserContact;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\InfoContact;
use Illuminate\Support\Facades\Mail;

class ContactController
{
    public function __invoke(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|min:5',
            'phone' => 'required|string|min:7|max:12',
            'email' => 'required|email',
            'message' => 'required|string|min:10',
        ]);

        $contact = InfoContact::create(
            $request->only([
                'name', 'phone', 'email', 'message'
            ])
        );

        Mail::to('juaco.1826@gmail.com')->send(new UserContact($contact));

        return response(json_encode(['message' => 'Saved.']), 201)->header('Content-Type', 'text/json');

    }
}