<?php
/**
 * Created by PhpStorm.
 * User: joacomidsoluciones
 * Date: 28/08/17
 * Time: 2:49 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'cart';
    protected $fillable = ['name', 'reference', 'price', 'discount', 'quantity', 'order_id'];
    protected $hidden = [

    ];

    public function order()
    {
        return $this->belongsToMany('App\Models\Order');
    }
}