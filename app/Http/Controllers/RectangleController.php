<?php

namespace App\Http\Controllers;

use App\Models\Rectangle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RectangleController extends Controller
{
    public function createRectangle(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'base' => ['required', 'numeric', 'min:0'],
            'height' => ['required', 'numeric', 'min:0'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Dados inválidos!',
                'errors' => $validator->errors()
            ], 400);
        }

        $rectangle = Rectangle::create([
            'base' => $request->input('base'),
            'height' => $request->input('height')
        ]);

        return response()->json([
            'message' => 'Rectangle registered successfully.',
            'rectangle' => $rectangle
        ], 201);
    }
}
