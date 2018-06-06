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

        $contact = InfoContact::create(
            $request->only([
                'name', 'phone', 'email', 'message'
            ])
        );

        Mail::to('juaco.1826@gmail.com')->send(new UserContact($contact));

        return response(json_encode(['message' => 'Saved.']), 201)->header('Content-Type', 'text/json');

    }
}