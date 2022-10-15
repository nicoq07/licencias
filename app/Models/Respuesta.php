<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Respuesta
 *
 * @property int $id
 * @property string $descripcion
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\RespuestaFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Respuesta newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Respuesta newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Respuesta query()
 * @method static \Illuminate\Database\Eloquent\Builder|Respuesta whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Respuesta whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Respuesta whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Respuesta whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Respuesta extends Model
{
    use HasFactory;
}
