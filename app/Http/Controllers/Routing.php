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
        $data['faqs'] = [
            'title' => 'The most popular questions to discuss Physiotherapy',
            'faqs' => [['question' => 'What is physiotherapy?', 'answer' => 'Physiotherapy, also known as physical therapy, is a healthcare profession focused on assessing, diagnosing, and treating musculoskeletal and neurological conditions. It involves a range of techniques such as manual therapy, exercise prescription, and modalities like ultrasound and electrical stimulation to promote recovery and improve function.'], ['question' => 'What conditions can physiotherapy treat?', 'answer' => 'Physiotherapy can address a wide range of conditions including sports injuries, back and neck pain, arthritis, stroke rehabilitation, neurological disorders, post-surgical recovery, and chronic pain conditions. It is also effective in managing conditions like asthma, incontinence, and workplace injuries.'], ['question' => 'What should I expect during a physiotherapy session?', 'answer' => 'During your initial session, the physiotherapist will conduct a thorough assessment to understand your condition, medical history, and goals. They will then develop a personalized treatment plan which may include manual therapy, exercises, education, and modalities as needed. Subsequent sessions will focus on implementing and progressing the treatment plan.'], ['question' => 'How many physiotherapy sessions will I need?', 'answer' => 'The number of sessions required varies depending on the nature and severity of your condition, as well as your individual goals. Your physiotherapist will discuss this with you during your initial assessment and regularly review your progress to adjust the treatment plan as needed.'], ['question' => 'Is physiotherapy painful?', 'answer' => 'Physiotherapy should not be painful, although you may experience some discomfort during certain exercises or manual therapy techniques. Your physiotherapist will work within your tolerance level and communicate with you to ensure that you are comfortable throughout the session.']],
        ];
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
                    $data['gallery'] =  $this->gallery();
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
                    $data['blogs'] = $this->recommended();
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
        return Gallery::get();
    }
    public function testimonials($limit = 0)
    {
        return Reviews::get();
    }
}
