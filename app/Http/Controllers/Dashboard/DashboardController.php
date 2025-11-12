<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Events\UserActivity;
use Illuminate\Http\Request;
use App\Models\ProjectsModel;
use App\Models\NewsModel;
use App\Models\VideoModel;
use App\Models\ServicesModel;
use App\Models\ActivitiesModel;
use App\Models\EducationModel;

class DashboardController extends Controller
{ 
    public function index()
    {
        event(new UserActivity());

        $totalProjects = ProjectsModel::count();
        $totalNews = NewsModel::count();
        $totalVideos = VideoModel::count();
        $totalServices = ServicesModel::count();
        $totalActivities = ActivitiesModel::count();
        $totalEducation = EducationModel::count();

        return view('Dashboard.dashboard', compact('totalProjects', 'totalNews', 'totalVideos', 'totalServices', 'totalActivities', 'totalEducation'))->with('title', 'Dashboard');
    }
}
