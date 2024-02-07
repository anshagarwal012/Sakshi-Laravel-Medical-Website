<?php

namespace App\Http\Controllers;

use App\Models\Users;

use Illuminate\Http\Request;

class Backend extends Controller
{
    #dynamic routing
    public function index(Request $request)
    {
        if (view()->exists($request->path()) || in_array($request->path(), $this->wildcards_get())) {
            $login_check = $request->session()->get('login');
            // dd($login_check);
            if ($login_check) {
                $data = [];
                switch ($request->path()) {
                    case 'admin/login':
                        return view('admin.login');
                        break;
                    case 'admin/logout':
                        $request->session()->forget('login');
                        $request->session()->forget('user');
                        return redirect('admin/login');
                        break;
                }
                return view($request->path(), ['data' => $data]);
            }
            return view('admin.login');
        } else {
            return view('admin.404');
        }
    }

    public function post_(Request $request)
    {
        if (view()->exists($request->path()) || in_array($request->path(), $this->wildcards())) {
            $data = [];
            switch ($request->path()) {
                case 'admin/validate_login':
                    $d = Users::where('user_id', $request->username)->where('password', $request->password)->first();
                    if ($d == null) {
                        return back()->with('message', "User Not Found");
                    }
                    $request->session()->put('login', true);
                    $request->session()->put('user', $d);
                    return redirect('admin/dashboard');
                    break;
            }
            return view($request->path(), ['data' => $data]);
        } else {
            return view('admin.404');
        }
    }

    public function wildcards()
    {
        return [
            'admin/validate_login'
        ];
    }
    
    public function wildcards_get()
    {
        return [
            'admin/logout'
        ];
    }
}