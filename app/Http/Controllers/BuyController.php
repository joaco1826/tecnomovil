<?php
/**
 * Created by PhpStorm.
 * User: joacomidsoluciones
 * Date: 28/08/17
 * Time: 9:29 AM
 */

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\Cart as Items;
use App\Models\Address;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BuyController extends BaseController
{
    public function buy(Request $request)
    {
        $address = Address::find($request->address_id);
        if ($address->client_id != Auth::user()->id) {
            return response(json_encode(['message' => 'No authorize.']), 401)->header('Content-Type', 'text/json');
        } else {
            $md = substr(md5(uniqid(rand())),0,10);
            $total = str_replace(',','', Cart::subtotal());
            $amount = intval($total + $address->city->flete);
            $order = Order::create([
                'client_id' => Auth::user()->id,
                'address_id' => $address->id,
                'reference' => $md,
                'total' => $amount,
                'shipping' => $address->city->flete,
                'deleted_at' => null,
            ]);
            if ($order) {
                foreach (Cart::content() as $c) {
                    $pro = Product::find($c->id);
                    Items::create([
                        'name' => $c->name,
                        'reference' => $pro->reference,
                        'price' => $c->price,
                        'discount' => $pro->discount,
                        'quantity' => $c->qty,
                        'order_id' => $order->id,
                        'size' => $c->options->size
                    ]);
                }
                Cart::destroy();

                return response(json_encode(['reference' => $order->id]), 200)->header('Content-Type', 'text/json');
            } else {
                return response(json_encode(['message' => 'Error.']), 500)->header('Content-Type', 'text/json');
            }
        }

    }
}