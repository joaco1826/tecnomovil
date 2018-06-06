<?php
/**
 * Created by PhpStorm.
 * User: joacomidsoluciones
 * Date: 29/08/17
 * Time: 11:12 AM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'address';
    protected $fillable = ['client_id', 'description', 'name', 'address', 'urbanization', 'country_id', 'distric_id', 'city_id', 'cellphone', 'phone'];

    function distric() {
        return $this->belongsTo('App\Models\Distric');
    }

    function city() {
        return $this->belongsTo('App\Models\City');
    }

    function country() {
        return $this->belongsTo('App\Models\Country');
    }

}