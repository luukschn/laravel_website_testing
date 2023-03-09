<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scores extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'score1',
        'score2',
        'userId',
        'created_at',
        'updated_at'
    ];

}
