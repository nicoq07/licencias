<?php
namespace App\Traits;
use App\Models\Usuario;
trait AuthorizationTrait {
    public function index() {
        $usuarios = Usuario::all();
        return $usuarios->toJson();
    }
}