<?php
/**
 * Created by PhpStorm.
 * User: joacomidsoluciones
 * Date: 28/08/17
 * Time: 9:29 AM
 */

namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class CartController extends BaseController
{
    public function __invoke(Request $request)
    {
        $id = $request->id;
        $qty = $request->qty;
        $action = $request->action;
        switch ($action) {
            case "add":
                $product = Product::find($id);
                $price = $product->price - ($product->price * $product->discount / 100);
                Cart::add($product->id, $product->name, $qty, $price, ['size' => $request->size]);
                break;
            case "remove":
                Cart::remove($id);
                break;
            case "update":
                Cart::update($id, $qty);
                break;
        }

        return response(json_encode(['count' => Cart::count(), 'total' => Cart::subtotal()]), 201)->header('Content-Type', 'text/json');

    }
}