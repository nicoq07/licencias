<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Usuario
 *
 * @property int $id
 * @property int $persona_id
 * @property string $nombre_usuario
 * @property string $email
 * @property int $rol_id
 * @property int $activo
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\UsuarioFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario query()
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereActivo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereNombreUsuario($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario wherePersonaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereRolId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Examen[] $examenes
 * @property-read int|null $examenes_count
 * @property-read \App\Models\Persona $persona
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\TokenUsuario[] $tokens
 * @property-read int|null $tokens_count
 */
class Usuario extends Model
{
    use HasFactory;

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }

    public function tokens()
    {
        return $this->hasMany(TokenUsuario::class);
    }
    public function examenes()
    {
        return $this->hasMany(Examen::class);
    }
}
