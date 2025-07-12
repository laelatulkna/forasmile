<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumentasi extends Model
{
    use HasFactory;

    public $table = "dokumentasi";
    public $primaryKey = "id_dokumentasi";
    public $guarded = ["id_dokumentasi"];
    public $timestamps  = false;
}
