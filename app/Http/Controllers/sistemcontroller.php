<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\citas_quiropractica;

class sistemcontroller extends Controller
{
    public function citas_quiropractica()
    {
        $citas = citas_quiropractica::all();
        return view("templates.citas_quiropractica")
        ->with(['citas' => $citas]);
    }
}
