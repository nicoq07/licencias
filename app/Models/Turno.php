<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Turno
 *
 * @property int $id
 * @property int $usuario_id
 * @property \Illuminate\Support\Carbon
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
 * @property-read \App\Models\Usuario $usuario
 * @property string $fecha
 */
class Turno extends Model
{
    use HasFactory;
    protected $fillable = ['usuario_id', 'fecha', 'asistio', 'activo'];
    // protected $casts = [
    //     'fecha' => 'datetime:Y-m-d H:i',
    // ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }


    protected function fecha(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => date('d/m/Y H:i', strtotime($value))
        );
    }
}
