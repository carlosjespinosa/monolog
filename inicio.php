<?php
declare(strict_types=1);
include("vendor/autoload.php");

use Dwes\Monologos\HolaMonolog;

$prueba = new HolaMonolog();
$prueba->saludar();
$prueba->despedir();


?>