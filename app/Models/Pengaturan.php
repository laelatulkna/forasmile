<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaturan extends Model
{
    use HasFactory;

    public $table = "pengaturan";
    public $primaryKey = "id_pengaturan";
    public $guarded = ["id_pengaturan"];
    public $timestamps  = false;
}
