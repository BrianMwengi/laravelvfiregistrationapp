<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vfi extends Model
{
    use HasFactory;
    // Table Name
    protected $table = 'vfis';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    protected $casts = ['status' => 'boolean'];
    
    protected $fillable = ['status'];
}
