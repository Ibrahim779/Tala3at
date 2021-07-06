<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FavoriteResource;
use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{

    public function index()
    {
        return FavoriteResource::collection(Favorite::whereUserId(auth()->id())->get());
    }

    public function store(Request $request)
    {
        if (!Favorite::exist($request->meeting_id)){

            Favorite::create($request->merge(['user_id' => auth()->id()])->all());

            return response()->json(['message' => 'added successfully']);
        }

        return response()->json(['message' => 'is exist']);
    }

    public function destroy(Favorite $favorite)
    {
        $favorite->delete();

        return response()->json(null, 204);
    }
}
