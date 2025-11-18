<?php 
namespace App\Services\Fichaje;

interface FichajeStrategy {
    public function registrar(array $datos);
}
