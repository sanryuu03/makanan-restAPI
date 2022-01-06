<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Food::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $food = new Food;
        $food->codeFood = $request -> codeFood;
        $food->name = $request -> name;
        $food->description = $request -> description;
        $food->save();

        return response()->json([
            'code food' => $food->codeFood,
            'name' => $food->name,
            'deskripsi' => $food->description,
            'result' => 'create data successfully!'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show(Food $food)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function edit(Food $food)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $codeFood = $request->codeFood;
        $name = $request->name;
        $description = $request->description;

        $food = Food::find($id);
        $food->codeFood = $codeFood;
        $food->name = $name;
        $food->description = $description;

        $food->save();

        return response()->json([
            'code food' => $food->codeFood,
            'name' => $food->name,
            'deskripsi' => $food->description,
            'result' => 'data updated!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $food = Food::find($id);
        $food->delete();

        return 'data deleted';
    }
}
