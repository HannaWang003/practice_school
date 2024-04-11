<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Title;
use App\Models\Total;

class MyController extends Controller
{
    public function myindex()
    {
        $title = title::where('sh', '1')->first();
        $total = Total::find(1);
        return view('layouts.app', ['title' => $title, 'total' => $total]);
    }
}
