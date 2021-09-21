<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kembali extends Model
{
    use HasFactory;
    protected $table = "pengembalians";
    protected $primaryKey = "id_kembali";
    protected $fillable = ["sewa_id",  "denda", "catatab", "created_at", "updated_at"];
}
