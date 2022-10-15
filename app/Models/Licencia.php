<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Licencia
 *
 * @property int $id
 * @property string $fecha_obtencion
 * @property string $fecha_vencimiento
 * @property int $licencia_clase_id
 * @property int $examen_id
 * @property int $usuario_id
 * @property string $observaciones
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\LicenciaFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Licencia newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Licencia newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Licencia query()
 * @method static \Illuminate\Database\Eloquent\Builder|Licencia whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Licencia whereExamenId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Licencia whereFechaObtencion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Licencia whereFechaVencimiento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Licencia whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Licencia whereLicenciaClaseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Licencia whereObservaciones($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Licencia whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Licencia whereUsuarioId($value)
 * @mixin \Eloquent
 */
class Licencia extends Model
{
    use HasFactory;
}
