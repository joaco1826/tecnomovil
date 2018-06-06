<?php
/**
 * Created by PhpStorm.
 * User: joacomidsoluciones
 * Date: 24/08/17
 * Time: 11:00 AM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    function labels() {
        return $this->hasMany('App\Models\Label');
    }
}