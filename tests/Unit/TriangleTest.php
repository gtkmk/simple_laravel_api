<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use App\Models\Triangle;

class TriangleTest extends TestCase
{
    use DatabaseTransactions;

    public function testCreateTriangle()
    {
        $data = [
            'base' => 10,
            'height' => 15
        ];

        $response = $this->json('POST', 'api/triangles', $data);

        $response->assertStatus(Response::HTTP_CREATED);

        $this->assertDatabaseHas('triangles', [
            'base' => $data['base'],
            'height' => $data['height']
        ]);

        $triangle = Triangle::first();

        $this->assertEquals($data['base'], $triangle->base);
        $this->assertEquals($data['height'], $triangle->height);
    }
}