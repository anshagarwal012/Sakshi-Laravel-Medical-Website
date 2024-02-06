<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Routing extends Controller
{
    public function root()
    {
        $data['services'] = $this->services();
        $data['faqs'] = [
            'title' => 'The most popular questions to discuss Physiotherapy',
            'faqs' => [['question' => 'What is physiotherapy?', 'answer' => 'Physiotherapy, also known as physical therapy, is a healthcare profession focused on assessing, diagnosing, and treating musculoskeletal and neurological conditions. It involves a range of techniques such as manual therapy, exercise prescription, and modalities like ultrasound and electrical stimulation to promote recovery and improve function.'],['question' => 'What conditions can physiotherapy treat?', 'answer' => 'Physiotherapy can address a wide range of conditions including sports injuries, back and neck pain, arthritis, stroke rehabilitation, neurological disorders, post-surgical recovery, and chronic pain conditions. It is also effective in managing conditions like asthma, incontinence, and workplace injuries.'],['question' => 'What should I expect during a physiotherapy session?', 'answer' => 'During your initial session, the physiotherapist will conduct a thorough assessment to understand your condition, medical history, and goals. They will then develop a personalized treatment plan which may include manual therapy, exercises, education, and modalities as needed. Subsequent sessions will focus on implementing and progressing the treatment plan.'],['question' => 'How many physiotherapy sessions will I need?', 'answer' => 'The number of sessions required varies depending on the nature and severity of your condition, as well as your individual goals. Your physiotherapist will discuss this with you during your initial assessment and regularly review your progress to adjust the treatment plan as needed.'],['question' => 'Is physiotherapy painful?', 'answer' => 'Physiotherapy should not be painful, although you may experience some discomfort during certain exercises or manual therapy techniques. Your physiotherapist will work within your tolerance level and communicate with you to ensure that you are comfortable throughout the session.']],
        ];
        $data['testimonials'] = $this->testimonials();

        return view('home', ['data' => $data]);
    }
    #dynamic routing
    public function index(Request $request)
    {
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
            }
            return view($request->path(), ['data'=>$data]);
        } else {
            return view('404');
        }
    }
    public function services($limit = 0){
        return [
            ['image' => 'assets/images/service_logo/Asset 3.png', 'title' => 'Physiotherapy', 'desc' => 'Physiotherapy, also known as physical therapy, is a healthcare profession focused on assessing, diagnosing, and treating musculoskeletal and neurological conditions.', 'url' => '/Our_Service',],
            ['image' => 'assets/images/service_logo/Asset 2.png', 'title' => 'Occupational Therapy', 'desc' => 'Occupational therapy empowers individuals to achieve meaningful participation in daily activities. Through personalized interventions, occupational therapists address.', 'url' => '/Our_Service',],
            ['image' => 'assets/images/service_logo/Asset 1.png', 'title' => 'Speech Therapy', 'desc' => ' Speech therapy is a specialized field aimed at improving communication and swallowing abilities. Speech therapists assess and treat a range of speech, language, and swallowing disorders.', 'url' => '/Our_Service',]
        ];
    }
    public function gallery($limit = 0) {
        return [
            'title' => 'Client Photo','subline'=> 'People are connected with us','photo'=>[
                'assets/images/gallery/gallery_image_1-min.jpg',
                'assets/images/gallery/gallery_image_1-min.jpg',
                'assets/images/gallery/gallery_image_1-min.jpg',
                'assets/images/gallery/gallery_image_1-min.jpg',
                'assets/images/gallery/gallery_image_1-min.jpg',
                'assets/images/gallery/gallery_image_1-min.jpg',
            ]
        ];
    }
    public function testimonials($limit = 0) {
        return [
            ['title' => 'Arshia Tabassum', 'description' => 'Dr.Sakshi was giving physiotherapy to my mother who has lung infection. She was very polite and friendly to my mother. She knows how to handle senior citizens. My mother was very comfortable with her. My mother\'s physical condition had improved because of Dr.
            Sakshi\'s physiotherapy.', 'ratings' => 5],
            ['title' => 'Deepak Sharma', 'description' => 'Highly recommend this physiotherapy She is friendly and professional, and the facility is clean and well-equipped. After just a few sessions, I already feel a noticeable improvement in my mobility and strength', 'ratings' => 4],
            ['title' => 'Abhay Singh', 'description' => 'Outstanding physiotherapy!.They combine professionalism with a personal touch, ensuring that every session is effective and enjoyable. I appreciate the holistic approach they take to address both my physical and emotional well-being.', 'ratings' => 3],
            ['title' => 'Himanshu Verma', 'description' => 'Five-star experience! From the moment I walked in, I felt welcomed and supported. The therapist here are truly dedicated to helping their Patients achieve their goals. I\'m grateful for the progress I\'ve made under their guidance.', 'ratings' => 2],
            ['title' => 'Abhishek Tripathi', 'description' => 'After struggling with chronic pain for months, I finally decided to try physiotherapy, and I\'m so glad I did. The therapist here are skilled at identifying the root cause of my discomfort and providing targeted treatment. I\'m already feeling stronger and more confident in my body.', 'ratings' => 1],
            ['title' => 'Saket Yadav', 'description' => 'Impressive results! I\'ve been struggling with post-surgery recovery, but thanks to the guidance of the skilled therapist, I\'m making significant progress. Their expertise and encouragement have been invaluable on my road to recovery.', 'ratings' => 3],
        ];
    }
}
