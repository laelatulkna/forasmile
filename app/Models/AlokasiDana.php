<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlokasiDana extends Model
{
    use HasFactory;

    public $table = "pengalokasian_dana";
    public $primaryKey = "id_pengalokasian_dana";
    public $guarded = ["id_pengalokasian_dana"];
    public $timestamps  = false;
}
