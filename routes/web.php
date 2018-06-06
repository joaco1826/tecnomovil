<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Models\Address;
use App\Models\Client;
use App\Models\Country;
use App\Models\Order;
use App\Models\Product;

Route::get('/', function () {
    return view('welcome', [
        'destacados' => Product::where(['status' => 'activo', 'featured' => 'SI'])->get(),
        'ofertas' => Product::where(['status' => 'activo'])->where('discount', '>', '0')->get(),
    ]);
});

Route::get('/product', function () {
    return view('product');
});

Route::get('/productos', function () {
    return view('productos', [
        'products' => \App\Models\Product::where('status', 'activo')->get(),
    ]);
});

Route::get('/producto/{name}/{id}', function ($name, $id) {
    $product = Product::find($id);
    $products = Product::where(['status' => 'activo'])->get();
    return view('product', [
        'product' => $product,
        'products' => $products,
    ]);
})->where(['id' => '[0-9]+', 'name' => '[a-z-0-9]+']);

Route::group(['middleware' => 'auth'], function(){
    Route::get('/cuenta', function () {
        return view('cuenta', [
            'client' => Client::find(Auth::user()->id)
        ]);
    });

    Route::get('/direcciones', function () {
        return view('direcciones', [
            'address' => Address::where('client_id', Auth::user()->id)->get()
        ]);
    });

    Route::get('/nueva-direccion', function () {
        return view('nueva-direccion', [
            'country' => Country::all(),
        ]);
    });

    Route::get('/editar-direccion/{id}', function ($id) {
        return view('editar-direccion', [
            'country' => Country::all(),
            'address' => Address::find($id)
        ]);
    });

    Route::get('/contrasena', function () {
        return view('contrasena');
    });
    Route::get('/seleccionar', function () {
        return view('seleccionar', [
            'address' => Address::where('client_id', Auth::user()->id)->get()
        ]);
    });

    Route::get('/pagos', function () {
        return view('pagos', [
            'payments' => Order::where('client_id', Auth::user()->id)->get()
        ]);
    });

    Route::get('/pagos/{id}', function ($id) {
        $order = Order::find($id);
        return view('detalle-pago', [
            'payment' => $order,
            'address' => Address::find($order->address_id)
        ]);
    });

    Route::get('/pagar/{id}', function ($id) {
        return view('pagar', [
            'address' => Address::find($id),
            'id' => $id
        ]);
    });

    Route::get('/payu/{id}', function ($id) {
        $order = Order::find($id);
        return view('payu', [
            'order' => $order,
            'address' => Address::find($order->address_id),
            'user' => Auth::user()
        ]);
    })->where(['id' => '[0-9]+']);

    Route::post('/client-updated', 'ClientController@update');
    Route::post('/address', 'AddressController');
    Route::post('/change-password', 'Auth\UpdatePasswordController@change');
    Route::post('/buy', 'BuyController@buy');
});



Route::get('/carrito', function () {
    return view('carrito', [
        'country' => Country::all(),
    ]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/pagination-products', 'PaginationController');
Route::post('/pagination-products', 'PaginationController');
Route::post('/pagination-new', 'PaginationController@nuevo');
Route::post('/pagination-sale', 'PaginationController@sale');
Route::post('/cart', 'CartController');
Route::post('/country', 'CountryController');
Route::post('/contact', 'ContactController');
