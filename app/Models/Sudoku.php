<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sudoku extends Model
{
    use HasFactory;

    protected $primaryKey = 'userId';

    # TODO: need to set this to minimum value of 0
    protected $fillable = [
        'sudoku_elo'
    ];
}
