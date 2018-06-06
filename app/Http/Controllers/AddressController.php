<?php
/**
 * Created by PhpStorm.
 * User: joacomidsoluciones
 * Date: 29/08/17
 * Time: 12:20 PM
 */

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AddressController
{
    public function __invoke(Request $request)
    {
        $action = $request->action;

        switch ($action) {
            case "save":
                Address::create([
                    'client_id' => Auth::user()->id,
                    'description' => $request->description,
                    'name' => $request->name,
                    'address' => $request->address,
                    'urbanization' => $request->urbanization,
                    'country_id' => $request->country,
                    'distric_id' => $request->distric,
                    'city_id' => $request->city,
                    'cellphone' => $request->cellphone,
                    'phone' => $request->phone,
                ]);
                break;
            case "update":
                $address = Address::find($request->address_id);
                $address->update([
                    'description' => $request->description,
                    'name' => $request->name,
                    'address' => $request->address,
                    'urbanization' => $request->urbanization,
                    'country_id' => $request->country,
                    'distric_id' => $request->distric,
                    'city_id' => $request->city,
                    'cellphone' => $request->cellphone,
                    'phone' => $request->phone,
                ]);
                break;
            case "delete":
                $address = Address::find($request->id);
                $address->delete();
                break;
        }

        return response(json_encode(["Message" => "Saved."]), 201)->header('Content-Type', 'text/json');

    }
}