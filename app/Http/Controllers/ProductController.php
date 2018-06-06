<?php
/**
 * Created by PhpStorm.
 * User: joacomidsoluciones
 * Date: 28/08/17
 * Time: 2:30 PM
 */

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;


class ProductController extends Controller
{

    public function views(Request $request)
    {

        $pro = Product::find($request->id);
        $views = $pro->views + 1;
        $pro->update([
            'views' => $views
        ]);

        return response(json_encode(['message' => 'Saved.']), 201)->header('Content-Type', 'text/json');
    }

}