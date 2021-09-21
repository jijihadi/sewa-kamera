<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sewa extends Model
{
    use HasFactory;
    protected $primaryKey = "id_sewa";
    protected $fillable = ["admin_id", "cust_id", "kamera_id", "jaminan_id", "tanggal_pesan", "tanggal_sewa",  "diambil", "harga",  "admin_id",  "catatan", "created_at", "updated_at"];
}
