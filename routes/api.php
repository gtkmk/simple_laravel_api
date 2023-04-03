<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RectangleController;
use App\Http\Controllers\TriangleController;
use App\Http\Controllers\PolygonController;

Route::post('rectangles', [RectangleController::class, 'createRectangle']);
Route::post('triangles', [TriangleController::class, 'createTriangle']);
Route::get('areasum', [PolygonController::class, 'getAreaSum']);