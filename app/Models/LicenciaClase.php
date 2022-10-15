<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\LicenciaClase
 *
 * @property int $id
 * @property string $descripcion
 * @property int $profesional
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\LicenciaClaseFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|LicenciaClase newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LicenciaClase newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LicenciaClase query()
 * @method static \Illuminate\Database\Eloquent\Builder|LicenciaClase whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LicenciaClase whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LicenciaClase whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LicenciaClase whereProfesional($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LicenciaClase whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class LicenciaClase extends Model
{
    use HasFactory;
}
