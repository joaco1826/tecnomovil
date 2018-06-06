<?php

namespace App\Http\Controllers\Auth;

use App\Models\Client;
use App\Models\Address;
use App\Models\Country;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/';


    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
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
        ]);
    }

    public function create(array $data)
    {
        $client = Client::create([
            'name' => $data["name"],
            'last_name' => $data["last_name"],
            'document' => $data["document"],
            'email' => $data["email"],
            'birthdate' => $data["birthdate"],
            'password' => $data["password"],
        ]);
        Address::create([
            'client_id' => $client->id,
            'description' => 'Casa',
            'name' => $data["name"],
            'address' => $data["address"],
            'urbanization' => $data["urbanization"],
            'country_id' => $data["country"],
            'distric_id' => $data["distric"],
            'city_id' => $data["city"],
            'cellphone' => $data["cellphone"],
            'phone' => $data["phone"],
        ]);
        return  $client;

    }

    public function showRegistrationForm()
    {
        return view('auth.register', [
            'country' => Country::all(),
        ]);
    }

}
