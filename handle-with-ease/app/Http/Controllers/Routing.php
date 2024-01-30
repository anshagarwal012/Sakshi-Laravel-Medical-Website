<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Routing extends Controller
{
    public function root()
    {
        return redirect('home');
    }

    public function index(Request $request)
    {
        if (view()->exists($request->path())) {
            return view($request->path());   
        }else{
            return view('404');
        }
    }
}
