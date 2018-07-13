<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class InfoContact extends Model
{
    protected $table = 'infocontact';

    protected $fillable = [
        'name', 'type', 'phone', 'email', 'message'
    ];

}