<?php
/**
 * Created by PhpStorm.
 * User: joacomidsoluciones
 * Date: 29/08/17
 * Time: 3:25 PM
 */

namespace App\Http\Controllers\Auth;

use App\User;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UpdatePasswordController extends Controller
{
    /*
     * Ensure the user is signed in to access this page
     */

    /**
     * Update the password for the user.
     *
     * @param  Request  $request
     * @return Response
     */
    public function change(Request $request)
    {
//        return Validator::make($request->all(), [
//            'old' => 'required',
//            'password' => 'required|min:6|confirmed',
//        ]);


        $user = Auth::user();
        $hashedPassword = $user->password;

        if (Hash::check($request->old, $hashedPassword)) {
            //Change the password
            $user_id = $user->id;
            $obj_user = Client::find($user_id);
            $obj_user->setPasswordAttribute($request->password);
            $obj_user->save();

            return response(json_encode(["Message" => "Su contraseña ha sido cambiada con exito."]), 201)->header('Content-Type', 'text/json');
        }

        return response(json_encode(["Message" => "Su clave actual es errada"]), 201)->header('Content-Type', 'text/json');


    }
}
