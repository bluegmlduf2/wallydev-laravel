<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreImageRequest;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreImageRequest $request)
    {
        $validatedData = $request->validated();

        $imageFile = $validatedData['image'];
        $imageName = time() . '.' . $imageFile->extension();

        Storage::putFileAs('public', $imageFile, $imageName);

        return response()->json(['url' => asset('storage/' . $imageName)]);
    }
}
