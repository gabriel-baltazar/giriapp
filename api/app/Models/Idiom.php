<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idiom extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'idiom';
    protected $fillable = [
        'criadoPor', 'expressao_pt', 'expressao_en'
    ];
}
