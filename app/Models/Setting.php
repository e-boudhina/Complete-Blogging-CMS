<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    // You can use .env for setting but this is more dynamic
    protected $guarded = [
      'id'
    ];
}
