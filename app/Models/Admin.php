<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $table = 'admin';
    protected $fillable = [
        'nama',
        'username',
        'password'
    ];
}
