<?php

namespace App\Http\Controllers;

use App\Models\Total;
use Illuminate\Http\Request;

class TotalController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Total $total)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Total $total)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Total $total)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Total $total)
    {
        //
    }
    // my
    public function mytotal()
    {
        $total = Total::where();
        return view('layouts.app', ['total' => $total]);
    }
}
