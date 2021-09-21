<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jaminan extends Model
{
    use HasFactory;
    protected $primaryKey = "id_jaminan";
    protected $fillable = ["jenis_jaminan", "janis_jaminan", "no_jaminan", "created_at", "updated_at"];
}
