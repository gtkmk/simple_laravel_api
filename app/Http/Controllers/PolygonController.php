<?php

namespace App\Http\Controllers;

use App\Models\Rectangle;
use App\Models\Triangle;
use Illuminate\Http\Request;

class PolygonController extends Controller
{
    public function getAreaSum()
    {
        $rectangles = Rectangle::all();
        $triangles = Triangle::all();
        
        if ($rectangles->isEmpty() && $triangles->isEmpty()) {
            return response()->json([
                'message' => 'There are no rectangles or triangles registered'
            ], 404);
        }

        $rectangleAreas = $rectangles->map(function ($rectangle) {
            return $this->calculateArea($rectangle);
        });

        $triangleAreas = $triangles->map(function ($triangle) {
            return $this->calculateArea($triangle) / 2;
        });

        $areaSum = $rectangleAreas->sum() + $triangleAreas->sum();

        return response()->json([
            'message' => 'value of the sum of the areas of all registered polygons: ' .$areaSum,
        ], 200);
    }

    private function calculateArea($polygon)
    {
        if (!isset($polygon->base) || !isset($polygon->height)) {
            return 0;
        }

        return $polygon->base * $polygon->height;
    }
}
