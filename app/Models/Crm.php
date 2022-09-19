<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crm extends Model
{
    use HasFactory;

    // fillの内容を取り込む
    protected $fillable = [
        'name',
        'email',
        'zipcode',
        'address',
        'tel',
    ];
}
