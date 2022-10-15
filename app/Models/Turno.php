<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Turno
 *
 * @property int $id
 * @property int $usuario_id
 * @property string $fecha
 * @property int $asistio
 * @property int $activo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\TurnoFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Turno newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Turno newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Turno query()
 * @method static \Illuminate\Database\Eloquent\Builder|Turno whereActivo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Turno whereAsistio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Turno whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Turno whereFecha($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Turno whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Turno whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Turno whereUsuarioId($value)
 * @mixin \Eloquent
 */
class Turno extends Model
{
    use HasFactory;
}
