<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable = [
        'path',
        'title',
        'description',

    ];
    public $timestamps = false;
}