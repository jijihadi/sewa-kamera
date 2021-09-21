<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $primaryKey = "id_cust";
    protected $fillable = ["nama_cust", "hp_cust", "email_cust", "alamat_cust", "created_at", "updated_at"];
}
