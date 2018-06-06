<?php
/**
 * Created by PhpStorm.
 * User: joacomidsoluciones
 * Date: 25/08/17
 * Time: 8:54 AM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    function brand() {
        return $this->belongsTo('App\Models\Brand');
    }

    function category() {
        return $this->belongsTo('App\Models\Category');
    }

    function images() {
        return $this->hasMany('App\Models\Image');
    }

    function labels() {
        return $this->belongsToMany('App\Models\Label', 'products_labels', 'products_id', 'labels_id');
    }

    function sizes() {
        return $this->belongsToMany('App\Models\Size', 'products_sizes', 'products_id', 'sizes_id');
    }
}