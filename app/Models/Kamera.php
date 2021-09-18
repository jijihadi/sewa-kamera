<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamera extends Model
{
    use HasFactory;
    protected $primaryKey = "id_kamera";
    protected $fillable = ["nama_kamera", "tipe_kamera", "merk_kamera", "harga_kamera", "gambar", "stok", "created_at", "updated_at"];
}
