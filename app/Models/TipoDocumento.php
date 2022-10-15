<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\TipoDocumento
 *
 * @method static \Database\Factories\TipoDocumentoFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|TipoDocumento newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoDocumento newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoDocumento query()
 * @mixin \Eloquent
 */
class TipoDocumento extends Model
{
    protected $table = 'tipos_documento';
    use HasFactory;
}
