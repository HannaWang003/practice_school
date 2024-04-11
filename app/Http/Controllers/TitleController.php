<?php

namespace App\Http\Controllers;

use App\Models\Title;
use Illuminate\Http\Request;

class TitleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $titles = Title::all();
        return view('title.index', ['titles' => $titles]);
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
    public function show(title $title)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(title $title)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, title $title)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(title $title)
    {
        //
    }
    // my
    public function mytitle()
    {
        $title = Title::where('sh', '1')->first();
        return view('layouts.app', ['title' => $title]);
    }
}
