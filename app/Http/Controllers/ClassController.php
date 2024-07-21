<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('classes');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $className = 'English';
        $capacity = 20;

        $price = 500;
        $time1 = "08:00";
        $time2 = "09:00";
        $fulled = true;
        

        Classe::create([
            'className' => $className,
            'capacity' => $capacity,
            'price' => $price,
            'time1' => $time1,
            'time2' => $time2,
            'fulled' => $fulled,

        ]);
        return 'data added suuccefly';
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
