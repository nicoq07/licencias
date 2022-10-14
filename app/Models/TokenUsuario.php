<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TokenUsuario extends Model
{
    protected $table = 'tokens_usuarios';
    use HasFactory;
}
