<?php
/**
 * Created by PhpStorm.
 * User: joacomidsoluciones
 * Date: 28/08/17
 * Time: 2:49 PM
 */

namespace App\Models;


use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{
    use Notifiable;
    protected $table = 'client';
    protected $fillable = ['name', 'last_name', 'document', 'email', 'birthdate', 'password'];
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}