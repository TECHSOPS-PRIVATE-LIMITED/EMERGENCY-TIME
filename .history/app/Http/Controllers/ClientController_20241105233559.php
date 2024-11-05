<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public fucntion index()
    {
        return view('clientside.index');
    }
}
