<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * App\Models\PreguntaExamen
 *
 * @property int $id
 * @property int $examen_id
 * @property int $pregunta_id
 * @property int $orden
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PreguntaExamen newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PreguntaExamen newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PreguntaExamen query()
 * @method static \Illuminate\Database\Eloquent\Builder|PreguntaExamen whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PreguntaExamen whereExamenId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PreguntaExamen whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PreguntaExamen whereOrden($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PreguntaExamen wherePreguntaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PreguntaExamen whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PreguntaExamen extends Pivot
{
    //
    protected $table = 'preguntas_examen';
}
