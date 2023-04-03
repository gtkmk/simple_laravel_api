<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use App\Models\Rectangle;

class RectangleTest extends TestCase
{
    use DatabaseTransactions;
    
    public function testCreateRectangle()
    {
        $data = [
            'base' => 10,
            'height' => 15
        ];

        $response = $this->json('POST', 'api/rectangles', $data);

        $response->assertStatus(Response::HTTP_CREATED);

        $this->assertDatabaseHas('rectangles', [
            'base' => $data['base'],
            'height' => $data['height']
        ]);

        $rectangle = Rectangle::first();

        $this->assertEquals($data['base'], $rectangle->base);
        $this->assertEquals($data['height'], $rectangle->height);
    }
}
