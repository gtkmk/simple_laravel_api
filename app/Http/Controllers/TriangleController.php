<?php

namespace App\Http\Controllers;

use App\Models\Triangle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TriangleController extends Controller
{
    public function createTriangle(Request $request)
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

        $triangle = Triangle::create([
            'base' => $request->input('base'),
            'height' => $request->input('height')
        ]);

        return response()->json([
            'message' => 'Triangle registered successfully.',
            'triangle' => $triangle
        ], 201);
    }
}
