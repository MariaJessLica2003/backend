<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\carouselItemRequest;
use Illuminate\Http\Request;
use App\Models\CarouselItems;

class carouselitemcontrollers extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return carouselItems::all();
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(carouselItemRequest $request)
    {
        //retrieve the validated import data
        $validated = $request->validated();
        $CarouselItems = CarouselItems::create($validated);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return carouselItems::find($id);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    }


    public function destroy(string $id)
    {
        $carouselItems = carouselItems::findOrfail($id);

        $carouselItems->delete();

        return $carouselItems;
    }
}
