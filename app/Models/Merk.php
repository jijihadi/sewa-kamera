<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merk extends Model
{
    use HasFactory;
    protected $primaryKey = "id_merk";
    protected $fillable = ["nama_merk", "created_at", "updated_at"];
}
