<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Revision
 *
 * @property int $id
 * @property string $fecha
 * @property float $graduacion_izquierda
 * @property float $graduacion_derecha
 * @property int $aprobado
 * @property int $usuario_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\RevisionFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Revision newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Revision newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Revision query()
 * @method static \Illuminate\Database\Eloquent\Builder|Revision whereAprobado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Revision whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Revision whereFecha($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Revision whereGraduacionDerecha($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Revision whereGraduacionIzquierda($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Revision whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Revision whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Revision whereUsuarioId($value)
 * @mixin \Eloquent
 */
class Revision extends Model
{
    protected $table = 'revisiones';
    use HasFactory;
}
