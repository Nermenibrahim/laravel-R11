<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Classe extends Model
{
    use HasFactory , SoftDeletes ;


    protected $fillable = [
        'className',
        'capacity',
        'price',
        'time1',
        'time2',
        'fulled',
    ];
}
