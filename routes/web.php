<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return ("Bem vindo!\n<br>
    Para utilizar essa API corretamente utilize as seguinte rotas:\n<br>
    Métodos POST: /api/rectangles || /api/triangles (passe os parametros 'base' e 'height' no corpo da requisição.)\n<br>
    Método GET: /api/areasum");
});