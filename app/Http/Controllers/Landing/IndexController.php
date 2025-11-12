<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\HomeContentSliderModel;
use App\Models\FaqModel;
use App\Models\ServiceCategoryModel;
use App\Models\ServicesModel;
use App\Models\AboutUsModel;
use App\Models\WhyUsModel;
use App\Models\HowItWorkModel;
use App\Models\YearExperiencesModel;
use App\Models\ProfileTeamModel;
use App\Models\ProjectsModel;
use App\Models\NewsModel;
use App\Models\VideoModel;
use App\Models\EducationModel;
use App\Models\ActivitiesModel;
use App\Models\ContactModel;
use App\Models\InboxContactModel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;




class IndexController extends Controller
{
    // home page
    public function index()
    {
        // $faqs = Faq::all();
        $categories = ServiceCategoryModel::all();
        $aboutUs = AboutUsModel::first();
        $whyUs = WhyUsModel::first();
        $howItWork = HowItWorkModel::first();
        $sliders = HomeContentSliderModel::all();
        $services = ServicesModel::latest()->take(4)->get(); // Get 4 services for the landing page
        $projects = ProjectsModel::latest()->take(4)->get();
        $news = NewsModel::latest()->take(3)->get();
        $faqs = FaqModel::take(5)->get();

        return view('Landing.home', [
            'faqs' => $faqs,
            'categories' => $categories,
            'sliders' => $sliders,
            'services' => $services,
            'aboutUs' => $aboutUs,
            'whyUs' => $whyUs,
            'howItWork' => $howItWork,
            'projects' => $projects,
            'news' => $news,
            'title' => 'Home',
        ]);
    }

    // about page
    public function about() 
    {
        $aboutUs = AboutUsModel::first();
        $whyUs = WhyUsModel::first();
        $howItWork = HowItWorkModel::first();
        $yearExp = YearExperiencesModel::first();
        $categories = ServiceCategoryModel::all();
        $profile = ProfileTeamModel::all();


        return view('Landing.about', [
            'aboutUs' => $aboutUs,
            'whyUs' => $whyUs,
            'howItWork' => $howItWork,
            'yearExp' => $yearExp,
            'categories' => $categories,
            'profile' => $profile,
            'title' => 'About',
        ]);
    }

    // services page
    public function services()
    {
        $services = ServicesModel::paginate(12); // Adjust the number per page as needed

        return view('Landing.services', [
            'services' => $services,
            'title' => 'Services'
        ]);
    }

    // service details
    public function service_details($slug)
    {
        $service = ServicesModel::where('slug', $slug)->firstOrFail();
        $otherServices = ServicesModel::where('id', '!=', $service->id)->take(5)->get();

        return view('Landing.details.service-details', [
            'service' => $service,
            'otherServices' => $otherServices,
            'title' => $service->en_title,
        ]);
    }

    // news page
    public function news()
    {
        $news = NewsModel::orderBy('news_date', 'desc')->paginate(12);
        return view('Landing.news', [
            'title' => 'News',
            'news' => $news,
        ]);
    }

    // news details
    public function news_details($slug)
    {
        $newsItem = NewsModel::where('slug', $slug)->firstOrFail();
        $otherNews = NewsModel::where('id', '!=', $newsItem->id)->latest()->take(3)->get();

        return view('Landing.details.news-details', [
            'title' => $newsItem->en_title,
            'newsItem' => $newsItem,
            'otherNews' => $otherNews,
        ]);
    }

     // projects page
     public function projects()
{
    $projects = ProjectsModel::orderBy('project_date', 'desc')->paginate(12);
    return view('Landing.projects', [
        'title' => 'Projects',
        'projects' => $projects,
    ]);
}
 
     // project details
     public function project_details($slug)
{
    $project = ProjectsModel::where('slug', $slug)->firstOrFail();
    $otherProjects = ProjectsModel::where('id', '!=', $project->id)->take(3)->get();

    return view('Landing.details.project-details', [
        'title' => $project->en_project_name,
        'project' => $project,
        'otherProjects' => $otherProjects,
    ]);
}

     // Activities page
     public function activities()
     {
         $activities = ActivitiesModel::orderBy('date', 'desc')->paginate(12);
         return view('Landing.activities', [
             'title' => 'Activities',
             'activities' => $activities,
         ]);
     }
     
     public function activities_details($slug)
     {
         $activitiesItem = ActivitiesModel::where('slug', $slug)->firstOrFail();
         $otherActivities = ActivitiesModel::where('id', '!=', $activitiesItem->id)->latest()->take(3)->get();
         return view('Landing.details.activities-details', [
             'title' => $activitiesItem->en_title,
             'activitiesItem' => $activitiesItem,
             'otherActivities' => $otherActivities,
         ]);
     }

    // education page
    public function education()
    {
        $educations = EducationModel::orderBy('date', 'desc')->paginate(12);
        return view('Landing.education', [
            'title' => 'Education',
            'educations' => $educations,
        ]);
    }
    
    public function education_details($slug)
    {
        $educationItem = EducationModel::where('slug', $slug)->firstOrFail();
        $otherEducation = EducationModel::where('id', '!=', $educationItem->id)->latest()->take(3)->get();
    
        return view('Landing.details.education-details', [
            'title' => $educationItem->en_title,
            'educationItem' => $educationItem,
            'otherEducation' => $otherEducation,
        ]);
    }


    // video page 
    public function video()
    {
        $videos = VideoModel::latest()->paginate(12);
        return view('Landing.video', [
            'title' => 'Video',
            'videos' => $videos,
        ]);
    }

    // contact page
    public function contact()
    {
        $captcha = $this->generateCaptcha();
        $token = Str::random(40);
        session(['form_token' => $token]);
        $contact = ContactModel::first();
        return view('Landing.contact', [
            'title' => 'Contact Us',
            'contact' => $contact,
            'captcha' => $captcha, 
            'token' => $token,
        ]);
    }

    public function storeInboxContact(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'nomor_handphone' => 'required|string|max:20',
            'deskripsi' => 'required|string',
            'captcha' => 'required|string|min:5|max:6|in:' . session('captcha_text'),
            'token' => 'required|in:' . session('form_token'),
        ]);

        if ($request->token !== session('form_token')) {
            return response()->json(['error' => 'Invalid token'], 422);
        }

        InboxContactModel::create($request->except('token', 'captcha'));

        session()->forget('form_token');

        return response()->json([
            'message' => 'Thanks! We have received your message/complaint/suggestion. We will immediately follow up and provide a response as soon as possible. Please be patient during this process '
        ]);
    }

    public function refreshCaptcha()
    {
        $captcha = $this->generateCaptcha();
        return response()->json(['captcha' => $captcha]);
    }

    private function generateCaptcha()
    {
        $characters = 'ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz23456789';
        $length = rand(5, 6); // Random length between 5 and 6
        $captcha = '';
        for ($i = 0; $i < $length; $i++) {
            $captcha .= $characters[rand(0, strlen($characters) - 1)];
        }
        
        $image = imagecreatetruecolor(180, 50); // Increased size to accommodate up to 6 characters
        $bg = imagecolorallocate($image, 0, 0, 0);
        $fg = imagecolorallocate($image, 0, 255, 0);
        
        imagefill($image, 0, 0, $bg);
        
        // Calculate position to center the text
        $font_size = 5;
        $char_width = imagefontwidth($font_size);
        $total_width = $length * $char_width;
        $start_x = (180 - $total_width) / 2;
        
        // Use a larger built-in font
        for($i = 0; $i < strlen($captcha); $i++) {
            imagechar($image, $font_size, $start_x + ($i * $char_width), 15, $captcha[$i], $fg);
        }
        
        // Add some noise
        for($i = 0; $i < 100; $i++) {
            imagesetpixel($image, rand(0, 180), rand(0, 50), $fg);
        }
        
        // Add two lines that don't interfere with the text
        imageline($image, 0, rand(0, 50), 180, rand(0, 50), $fg);
        imageline($image, 0, rand(0, 50), 180, rand(0, 50), $fg);
        
        ob_start();
        imagepng($image);
        $imageData = ob_get_clean();
        imagedestroy($image);
        
        $base64 = 'data:image/png;base64,' . base64_encode($imageData);
        session(['captcha_text' => $captcha]);
        
        return $base64;
    }

}


