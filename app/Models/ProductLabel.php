<?php
/**
 * Created by PhpStorm.
 * User: joacomidsoluciones
 * Date: 24/08/17
 * Time: 9:51 AM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class ProductLabel extends Model
{
    protected $table = 'products_labels';

//    public function labels()
//    {
//        return $this->belongsToMany('App\Models\Label','products_labels','products_id','labels_id');
//    }

}