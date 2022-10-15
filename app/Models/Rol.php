<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Rol
 *
 * @method static \Database\Factories\RolFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Rol newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rol newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rol query()
 * @mixin \Eloquent
 */
class Rol extends Model
{
    protected $table = 'Roles';
    use HasFactory;
}
