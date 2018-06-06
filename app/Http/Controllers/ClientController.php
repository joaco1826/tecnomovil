<?php
/**
 * Created by PhpStorm.
 * User: joacomidsoluciones
 * Date: 28/08/17
 * Time: 2:30 PM
 */

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class ClientController extends Controller
{

    protected $validationRules = [
            'name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:100|unique:client',
            'password' => 'required|min:6|confirmed',
            'document' => 'required|max:20',
            'address' => 'required|max:120',
            'urbanization' => 'required|max:80',
            'country' => 'required',
            'distric' => 'required',
            'city' => 'required',
            'cellphone' => 'required'
        ];

    public function update(Request $request)
    {

        $cliente = Auth::user();
        $cliente->update($request->all());

        return response(json_encode(['message' => 'Saved.']), 201)->header('Content-Type', 'text/json');
    }

}