<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\GrupoSanguineo
 *
 * @property int $id
 * @property string $descripcion
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\GrupoSanguineoFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|GrupoSanguineo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GrupoSanguineo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GrupoSanguineo query()
 * @method static \Illuminate\Database\Eloquent\Builder|GrupoSanguineo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GrupoSanguineo whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GrupoSanguineo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GrupoSanguineo whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class GrupoSanguineo extends Model
{
    protected $table = 'grupos_sanguineos';
    use HasFactory;
}
