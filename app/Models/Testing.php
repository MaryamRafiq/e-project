<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testing extends Model
{
   protected $fillable = [
        'name', 'description', 'role', 'status'
    ];
    /** @use HasFactory<\Database\Factories\TestingFactory> */
    use HasFactory;
}
