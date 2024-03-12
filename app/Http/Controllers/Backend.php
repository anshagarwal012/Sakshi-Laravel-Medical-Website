<?php

namespace App\Http\Controllers;

use App\Models\Users;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use App\Models\Services;
use App\Models\Faqs;
use App\Models\Blogs;
use App\Models\booking;
use App\Models\Contactus;
use App\Models\Gallery;
use App\Models\Reviews;
use App\Models\Assessment;

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
                    case 'admin/category':
                        $data = Category::get();
                        break;
                    case 'admin/faqs':
                        $data = Faqs::get();
                        break;
                    case 'admin/services':
                        $data = Services::get();
                        break;
                    case 'admin/add-blog':
                        $data['category'] = Category::get();
                        break;
                    case 'admin/blogs':
                        $data = Blogs::with('category')->get();
                        break;
                    case 'admin/review':
                        $data = Reviews::get();
                        break;
                    case 'admin/gallery':
                        $data = Gallery::get();
                        break;
                    case 'admin/contact':
                        $data = Contactus::get();
                        break;
                    case 'admin/Booking':
                        $data = booking::get();
                        break;
                    case 'admin/dashboard':
                        $data['Blogs'] = Blogs::count();
                        $data['Category'] = Category::count();
                        $data['FAQ'] = Faqs::count();
                        $data['Services'] = Services::count();
                        $data['Reviews'] = Reviews::count();
                        $data['Contact'] = Contactus::count();
                        $data['booking'] = booking::count();
                        $data['Gallery'] = booking::count();
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
                case 'admin/category':
                    $d = Category::create($request->all());
                    if ($d) {
                        return redirect()->back()->with('messages', "Category Inserted Successfully");
                    }
                    return redirect()->back()->with('messages', "Please Try Again");
                    break;
                case 'admin/faqs':
                    $d = Faqs::create($request->all());
                    if ($d) {
                        return redirect()->back()->with('messages', "FAQs Inserted Successfully");
                    }
                    return redirect()->back()->with('messages', "Please Try Again");
                    break;
                case 'admin/add-blog':
                    $data = $request->all();
                    $file = $request->file('image');
                    $fileName = time() . '_' . $file->getClientOriginalName();
                    // (Storage::disk('uploads')->put($fileName, $file->getContent()));
                    $request->image->move(public_path('uploads/blog'), $fileName);
                    $data['image'] = '/uploads/blog/'.$fileName;
                    $d = Blogs::create($data);
                    if ($d) {
                        return redirect()->back()->with('messages', "Blogs Inserted Successfully");
                    }
                    return redirect()->back()->with('messages', "Please Try Again");
                    break;
                case 'admin/services':
                    $data = $request->all();
                    $file = $request->file('image');
                    $fileName = time() . '_' . $file->getClientOriginalName();
                    // (Storage::disk('uploads')->put($fileName, $file->getContent()));
                    $request->image->move(public_path('uploads/services'), $fileName);
                    $data['image'] = '/uploads/services/'.$fileName;
                    Services::create($data);
                    return redirect()->back()->with('messages', "Services Inserted Successfully");
                    break;
                case 'admin/review':
                    $data = $request->all();
                    $file = $request->file('path');
                    if($file){
                        $fileName = time() . '_' . $file->getClientOriginalName();
                        // (Storage::disk('uploads')->put($fileName, $file->getContent()));
                        $request->path->move(public_path('uploads/review'), $fileName);
                        $data['path'] = '/uploads/review/'.$fileName;
                    }
                    $data['path'] = '';
                    Reviews::create($data);
                    return redirect()->back()->with('messages', "Reviews Inserted Successfully");
                    break;
                case 'admin/gallery':
                    $data = $request->all();
                    $file = $request->file('images');
                    $fileName = time() . '_' . $file->getClientOriginalName();
                    // (Storage::disk('uploads')->put($fileName, $file->getContent()));
                    $request->images->move(public_path('uploads/gallery'), $fileName);
                    $data['images'] = '/uploads/gallery/'.$fileName;
                    Gallery::create($data);
                    return redirect()->back()->with('messages', "Gallery Inserted Successfully");
                    break;
            }
            return view($request->path(), ['data' => $data]);
        } else {
            return view('admin.404');
        }
    }

    public function delete_(Request $request)
    {
        switch ($request->path()) {
            case 'admin/services':
                Services::where('id', $request->id)->delete();
            case 'admin/category':
                Category::where('id', $request->id)->delete();
            case 'admin/faqs':
                Faqs::where('id', $request->id)->delete();
            case 'admin/blogs':
                Blogs::where('id', $request->id)->delete();
            case 'admin/review':
                Reviews::where('id', $request->id)->delete();
            case 'admin/gallery':
                Gallery::where('id', $request->id)->delete();
            case 'admin/contact':
                Contactus::where('id', $request->id)->delete();
            case 'admin/Booking':
                booking::where('id', $request->id)->delete();
        }
        return back()->with('messages', "Date Deleted successfully");
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
    public function contact(Request $request)
    {
        $data = $request->all();
        Contactus::create($data);
        return [
            'status' => 1,
            'message' => 'Thanks for contacting us :)'
        ];
    }
    public function assessment(Request $request)
    {
        $data = $request->all();
        $final = ['form_data' => json_encode($data)];
        Assessment::create($final);
        return [
            'status' => 1,
            'message' => 'Thanks for Submitting Form :)'
        ];
    }
    public function booking(Request $request)
    {
        $data = $request->all();
        booking::create($data);
        return [
            'status' => 1,
            'message' => 'Thanks for contacting us :)'
        ];
    }
}
