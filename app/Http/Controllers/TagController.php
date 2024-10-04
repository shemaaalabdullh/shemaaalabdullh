<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
   
    public function index()
    {
        return response()->json(Tag::with('products')->get(), 200);
    }

   
    public function show($id)
    {
        $tag = Tag::with('products')->find($id);
        if (!$tag) {
            return response()->json(['message' => 'Tag not found'], 404);
        }
        return response()->json($tag, 200);
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $tag = Tag::create($validatedData);
        return response()->json($tag, 201);
    }

  
    public function update(Request $request, $id)
    {
        $tag = Tag::find($id);
        if (!$tag) {
            return response()->json(['message' => 'Tag not found'], 404);
        }

        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:255',
        ]);

        $tag->update($validatedData);
        return response()->json($tag, 200);
    }

 
    public function destroy($id)
    {
        $tag = Tag::find($id);
        if (!$tag) {
            return response()->json(['message' => 'Tag not found'], 404);
        }

        $tag->delete();
        return response()->json(['message' => 'Tag deleted'], 200);
    }
}
