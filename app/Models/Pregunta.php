<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Pregunta
 *
 * @property int $id
 * @property int $respuesta_id
 * @property string $descripcion
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\PreguntaFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Pregunta newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pregunta newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pregunta query()
 * @method static \Illuminate\Database\Eloquent\Builder|Pregunta whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pregunta whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pregunta whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pregunta whereRespuestaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pregunta whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Respuesta $respuesta
 */
class Pregunta extends Model
{
    use HasFactory;

    public function respuesta()
    {
        return $this->belongsTo(Respuesta::class);
    }
}
