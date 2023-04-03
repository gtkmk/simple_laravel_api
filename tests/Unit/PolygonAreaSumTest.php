<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Rectangle;
use App\Models\Triangle;

class PolygonAreaSumTest extends TestCase
{
    use DatabaseTransactions;

    public function testGetAreaSum()
    {
        $this->createPolygons();
        $response = $this->get('api/areasum');
        $response->assertStatus(200);

        $expectedAreaSum = $this->calculateExpectedAreaSum();
        $response->assertJson([
            'message' => 'value of the sum of the areas of all registered polygons: ' . $expectedAreaSum,
        ]);
    }

    private function createPolygons(): void
    {
        Rectangle::factory()->count(3)->create();
        Triangle::factory()->count(2)->create();
    }

    private function calculateExpectedAreaSum(): float
    {
        $rectangleAreas = $this->calculateRectangleAreas();
        $triangleAreas = $this->calculateTriangleAreas();
        return $rectangleAreas + $triangleAreas;
    }

    private function calculateRectangleAreas(): float
    {
        $rectangles = Rectangle::all();
        return $rectangles->map(function ($rectangle) {
            if (!isset($rectangle->base) || !isset($rectangle->height)) {
                return 0;
            }
            return $rectangle->base * $rectangle->height;
        })->sum();
    }

    private function calculateTriangleAreas(): float
    {
        $triangles = Triangle::all();
        return $triangles->map(function ($triangle) {
            if (!isset($triangle->base) || !isset($triangle->height)) {
                return 0;
            }
            return ($triangle->base * $triangle->height) / 2;
        })->sum();
    }
}
