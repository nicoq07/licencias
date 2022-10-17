<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PreguntaExamen
 *
 * @method static \Illuminate\Database\Eloquent\Builder|PreguntaExamen newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PreguntaExamen newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PreguntaExamen query()
 * @mixin \Eloquent
 */
class PreguntaExamen extends Model
{
    use HasFactory;
    protected $table = 'pregunta_examen';
}
