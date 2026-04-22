<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        return response()->json(Movie::all());
    }

    public function show($id)
    {
        return response()->json(Movie::findOrFail($id));
    }

    public function store(Request $request)
    {
        $movie = Movie::create($request->all());
        return response()->json($movie, 201);
    }

    public function update(Request $request, $id)
    {
        $movie = Movie::findOrFail($id);
        $movie->update($request->all());
        return response()->json($movie);
    }

    public function destroy($id)
    {
        Movie::findOrFail($id)->delete();
        return response()->json(['message' => 'Deleted']);
    }
}