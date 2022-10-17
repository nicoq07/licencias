<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\TipoDocumento
 *
 * @property int $id
 * @property string $descripcion
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\TipoDocumentoFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|TipoDocumento newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoDocumento newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoDocumento query()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoDocumento whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TipoDocumento whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TipoDocumento whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TipoDocumento whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TipoDocumento extends Model
{
    protected $table = 'tipos_documento';
    use HasFactory;
}
