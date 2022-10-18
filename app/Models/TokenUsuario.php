<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\TokenUsuario
 *
 * @property int $id
 * @property int $usuario_id
 * @property string $token
 * @property string|null $last_used_at
 * @property \Illuminate\Support\Carbon $expires_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\TokenUsuarioFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|TokenUsuario newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TokenUsuario newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TokenUsuario query()
 * @method static \Illuminate\Database\Eloquent\Builder|TokenUsuario whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TokenUsuario whereExpiresAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TokenUsuario whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TokenUsuario whereLastUsedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TokenUsuario whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TokenUsuario whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TokenUsuario whereUsuarioId($value)
 * @mixin \Eloquent
 */
class TokenUsuario extends Model
{
    protected $table = 'tokens_usuarios';
    use HasFactory;

    // protected function expiresAt(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn ($value) => date('d/m/Y H:i', strtotime($value))
    //     );
    // }
}
