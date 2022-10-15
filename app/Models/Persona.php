<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Persona
 *
 * @property int $id
 * @property string $nombre
 * @property string $apellido
 * @property int $documento
 * @property string $fecha_nacimiento
 * @property int $utiliza_anteojos
 * @property int $donante
 * @property int $sexo_id
 * @property int $grupo_sanguineo_id
 * @property int $tipo_documento_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\PersonaFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Persona newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Persona newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Persona query()
 * @method static \Illuminate\Database\Eloquent\Builder|Persona whereApellido($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Persona whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Persona whereDocumento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Persona whereDonante($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Persona whereFechaNacimiento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Persona whereGrupoSanguineoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Persona whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Persona whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Persona whereSexoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Persona whereTipoDocumentoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Persona whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Persona whereUtilizaAnteojos($value)
 * @mixin \Eloquent
 */
class Persona extends Model
{
    use HasFactory;
}
