<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Models\Services;
use App\Models\Category;
use App\Models\Faqs;
use App\Models\Blogs;
use App\Models\Contactus;
use App\Models\Gallery;
use App\Models\Reviews;
use Illuminate\Support\Facades\DB;

class Routing extends Controller
{
    public function root()
    {
        $data['services'] = $this->services();
        $data['faqs'] = $this->faqs();
        $data['testimonials'] = $this->testimonials();
        $data['blogs'] = $this->blogs(3);

        return view('home', ['data' => $data]);
    }
    #dynamic routing
    public function index(Request $request)
    {
        if ($request->path() == 'admin') return redirect('admin/login');
        if (view()->exists($request->path())) {
            $data = [];
            switch ($request->path()) {
                case 'about':
                    $data['services'] = $this->services();
                    $data['gallery'] =  $this->gallery(3);
                    break;
                case 'Our_Service':
                    $data['services'] = $this->services();
                    $data['gallery'] =  $this->gallery();
                    break;
                case 'our_gallery':
                    $data['gallery'] =  $this->gallery();
                    break;
                case 'review':
                    $data['testimonials'] = $this->testimonials();
                    break;
                case 'blogs':
                    $data['blogs'] = $this->blogs();
                    $data['blogs_recomended'] = $this->recommended();
                    $data['Category'] = $this->Category();
                    break;
                case 'book':
                    $data['services'] = $this->services();
                    break;
            }
            return view($request->path(), ['data' => $data]);
        } else {
            return view('404');
        }
    }

    public function recommended()
    {
        return Blogs::inRandomOrder()->limit(3)->get();
    }

    public function blog($id)
    {
        $results = Blogs::where('id', $id)->get()->first()->toArray();
        $randomBlogs = Blogs::inRandomOrder()->limit(3)->get();
        return view('single_blog', ['data' => $results, 'recent' => $randomBlogs]);
    }

    public function blogs($limit = 0)
    {
        if ($limit) return Blogs::with('category')->take($limit)->get();
        return Blogs::with('category')->get();
    }
    public function Category()
    {
        return Category::get();
    }
    public function services($limit = 0)
    {
        return services::get();
    }
    public function gallery($limit = 0)
    {
        if ($limit) return Gallery::take($limit)->get();
        return Gallery::get();
    }
    public function testimonials($limit = 0)
    {
        return Reviews::get();
    }
    public function faqs($limit = 0)
    {
        return [
            'title' => 'The most popular questions to discuss Physiotherapy',
            'faqs' => Faqs::get()
        ];
    }
}
