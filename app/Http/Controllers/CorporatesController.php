<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CorporatesController extends Controller
{
    public function index()
    {
        return view('corporates.index');
    }
}
