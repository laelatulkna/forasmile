<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donasi extends Model
{
    use HasFactory;

    public $table = "donasi";
    public $primaryKey = "id_donasi";
    public $guarded = ["id_donasi"];
    public $timestamps  = false;

    public function donatur()
    {
        return $this->belongsTo(Donatur::class, 'id_user', 'id_user');
    }

    public function alokasi()
    {
        return $this->belongsTo(AlokasiDana::class, 'id_pengalokasian_dana', 'id_pengalokasian_dana');
    }
}
