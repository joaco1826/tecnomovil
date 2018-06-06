<?php
/**
 * Created by PhpStorm.
 * User: joacomidsoluciones
 * Date: 28/08/17
 * Time: 4:30 PM
 */

namespace App\Http\Controllers;

use App\Models\Distric;
use App\Models\City;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class CountryController extends BaseController
{

    public function __invoke(Request $request)
    {
        $action = $request->action;
        switch ($action) {
            case "distric":
                $data= Distric::where('country_id', $request->id)->get();
                break;
            case "city":
                $data= City::where('distric_id', $request->id)->get();
                break;
        }

        return response(json_encode($data), 201)->header('Content-Type', 'text/json');

    }

}