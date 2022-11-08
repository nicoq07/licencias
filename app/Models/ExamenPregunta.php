<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ExamenPregunta
 *
 * @property int $id
 * @property int $pregunta_id
 * @property int $examen_id
 * @property int $resultado_al_responder
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\ExamenPreguntaFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|ExamenPregunta newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExamenPregunta newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExamenPregunta query()
 * @method static \Illuminate\Database\Eloquent\Builder|ExamenPregunta whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExamenPregunta whereExamenId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExamenPregunta whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExamenPregunta wherePreguntaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExamenPregunta whereResultadoAlResponder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExamenPregunta whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int|null $orden
 * @method static \Illuminate\Database\Eloquent\Builder|ExamenPregunta whereOrden($value)
 */
class ExamenPregunta extends Model
{
    use HasFactory;
    protected $table = 'examen_pregunta';
}
