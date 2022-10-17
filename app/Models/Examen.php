<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Examen
 *
 * @property int $id
 * @property string $fecha
 * @property int $usuario_id
 * @property int $nota
 * @property int $intento numero de intento
 * @property int $activo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\ExamenFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Examen newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Examen newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Examen query()
 * @method static \Illuminate\Database\Eloquent\Builder|Examen whereActivo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Examen whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Examen whereFecha($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Examen whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Examen whereIntento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Examen whereNota($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Examen whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Examen whereUsuarioId($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Pregunta[] $preguntas
 * @property-read int|null $preguntas_count
 * @property-read \App\Models\Usuario $usuario
 */
class Examen extends Model
{
    protected $table = 'examenes';
    use HasFactory;

    public function preguntas()
    {
        return $this->belongsToMany(Pregunta::class);
    }
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}
