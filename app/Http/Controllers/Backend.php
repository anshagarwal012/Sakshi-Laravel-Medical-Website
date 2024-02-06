<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Backend extends Controller
{
    #dynamic routing
    public function index(Request $request)
    {
        if (view()->exists($request->path())) {
            $data = [];
            switch ($request->path()) {
                case 'admin/login':
                    return view('admin.login');
                    break;
            }
            return view($request->path(), ['data'=>$data]);
        } else {
            return view('admin.404');
        }
    }

    public function post_(Request $request)
    {
        if (view()->exists($request->path()) || in_array($request->path(),$this->wildcards()) ) {
            $data = [];
            switch ($request->path()) {
                case 'admin/validate_login':
                    dd($request->all());
                    return view('admin.login');
                    break;
            }
            return view($request->path(), ['data'=>$data]);
        } else {
            return view('admin.404');
        }
    }

    public function wildcards(){
        return [
            'admin/validate_login'
        ];
    }
}
