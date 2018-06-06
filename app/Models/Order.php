<?php
/**
 * Created by PhpStorm.
 * User: joacomidsoluciones
 * Date: 28/08/17
 * Time: 2:49 PM
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    protected $fillable = ['client_id', 'address_id', 'reference', 'total', 'shipping', 'status', 'deleted_at'];
    protected $hidden = [

    ];

    public function cart()
    {
        return $this->hasMany('App\Models\Cart');
    }

    public function client_order()
    {
        return $this->belongsTo('App\Models\Client', 'client_id');
    }
}