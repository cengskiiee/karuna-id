<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Landing\IndexController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dashboard;
use App\Http\Middleware\CheckSessionTimeout;
use App\Http\Controllers\LanguageController;

Route::get('language/{locale}', [LanguageController::class, 'switchLang'])->name('language.switch');

Route::get('/', [IndexController::class, 'index'])->name('home');

Route::get('/about',[IndexController::class, 'about'])->name('about');

Route::get('/services',[IndexController::class, 'services'])->name('services');

Route::get('/service-details/{slug}', [IndexController::class, 'service_details'])->name('service-details');

Route::get('/news',[IndexController::class, 'news'])->name('news');
Route::get('/news-details/{slug}', [IndexController::class, 'news_details'])->name('news-details');


Route::get('/projects',[IndexController::class, 'projects'])->name('projects');
Route::get('/project-details/{slug}', [IndexController::class, 'project_details'])->name('project-details');


Route::get('/video',[IndexController::class, 'video'])->name('video'); 

Route::get('/activities',[IndexController::class, 'activities'])->name('activities'); 
Route::get('/activities/{slug}', [IndexController::class, 'activities_details'])->name('activities-details');


Route::get('/education',[IndexController::class, 'education'])->name('education'); 
Route::get('/education/{slug}', [IndexController::class, 'education_details'])->name('education-details');

// contact
Route::get('/contact-us',[IndexController::class, 'contact'])->name('contact');
Route::post('/contact-us',[IndexController::class, 'storeInboxContact'])->name('contact.storeInboxContact');
Route::get('/refresh-captcha',[IndexController::class, 'refreshCaptcha'])->name('refresh.captcha');


Route::fallback(function () {
    return view('errors.404');
});




// login
Route::get('/login', [LoginController::class, 'loginForm'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login');

Route::middleware(['auth', CheckSessionTimeout::class])->group(function (){
    // Dashboard
    Route::get('/dashboard',[Dashboard\DashboardController::class, 'index'])->name('dashboard');

    // home slider
    Route::get('/home-slider-content',[Dashboard\HomeContentController::class, 'index'])->name('home-slider-content');
    Route::post('/home-slider-content', [Dashboard\HomeContentController::class, 'store'])->name('home-slider-content.store');
    Route::get('/home-slider-content/{id}', [Dashboard\HomeContentController::class, 'show'])->name('home-slider-content.show');
    Route::put('/home-slider-content/{id}', [Dashboard\HomeContentController::class, 'update'])->name('home-slider-content.update');
    Route::delete('/home-slider-content/{id}', [Dashboard\HomeContentController::class, 'destroy'])->name('home-slider-content.destroy');
    // end home slider


    // About
    Route::get('/about-content',[Dashboard\AboutContentController::class, 'index'])->name('about-content');
    Route::put('/about-us/update',[Dashboard\AboutContentController::class, 'updateAboutUs'])->name('about-us.update');
    Route::put('/why-us/update',[Dashboard\AboutContentController::class, 'updateWhyUs'])->name('why-us.update');
    Route::put('/how-it-work/update',[Dashboard\AboutContentController::class, 'updateHowItWork'])->name('how-it-work.update');
    Route::put('/year-exp/update',[Dashboard\AboutContentController::class, 'updateYearExperiences'])->name('year-exp.update');
    // End About


    // Start Services
    Route::get('/services-content', [Dashboard\ServicesContentController::class, 'index'])->name('services-content');
    Route::post('/services-content', [Dashboard\ServicesContentController::class, 'store'])->name('services-content.store');
    Route::get('/services-content/{slug}', [Dashboard\ServicesContentController::class, 'show'])->name('services-content.show');
    Route::put('/services-content/{slug}', [Dashboard\ServicesContentController::class, 'update'])->name('services-content.update');
    Route::delete('/services-content/{slug}', [Dashboard\ServicesContentController::class, 'destroy'])->name('services-content.destroy');
// End Services


    // News
    Route::get('/news-content',[Dashboard\NewsContentController::class, 'index'])->name('news-content');
    Route::post('/news-content',[Dashboard\NewsContentController::class, 'store'])->name('news-content.store');
    Route::get('/news-content/{slug}',[Dashboard\NewsContentController::class, 'show'])->name('news-content.show');
    Route::put('/news-content/{slug}',[Dashboard\NewsContentController::class, 'update'])->name('news-content.update');
    Route::delete('/news-content/{slug}',[Dashboard\NewsContentController::class, 'destroy'])->name('news-content.destroy');
    // End News

    // Projects
    Route::get('/projects-content',[Dashboard\ProjectsContentController::class, 'index'])->name('projects-content');
    Route::post('/projects-content',[Dashboard\ProjectsContentController::class, 'store'])->name('projects-content.store');
    Route::get('/projects-content/{slug}',[Dashboard\ProjectsContentController::class, 'show'])->name('projects-content.show');
    Route::put('/projects-content/{slug}',[Dashboard\ProjectsContentController::class, 'update'])->name('projects-content.update');
    Route::delete('/projects-content/{slug}', [Dashboard\ProjectsContentController::class, 'destroy'])->name('projects-content.destroy');
    //End of Projects

    // Start Activities
    Route::get('/activities-content',[Dashboard\ActivitiesController::class, 'index'])->name('activities-content');
    Route::post('/activities-content',[Dashboard\ActivitiesController::class, 'store'])->name('activities-content.store');
    Route::get('/activities-content/{slug}',[Dashboard\ActivitiesController::class, 'show'])->name('activities-content.show');
    Route::put('/activities-content/{slug}',[Dashboard\ActivitiesController::class, 'update'])->name('activities-content.update');
    Route::delete('/activities-content/{slug}',[Dashboard\ActivitiesController::class, 'destroy'])->name('activities-content.destroy');
    // End Activities

    // Start Education
    Route::get('/education-content',[Dashboard\EducationController::class, 'index'])->name('education-content');
    Route::post('/education-content',[Dashboard\EducationController::class, 'store'])->name('education-content.store');
    Route::get('/education-content/{slug}',[Dashboard\EducationController::class, 'show'])->name('education-content.show');
    Route::put('/education-content/{slug}',[Dashboard\EducationController::class, 'update'])->name('education-content.update');
    Route::delete('/education-content/{slug}',[Dashboard\EducationController::class, 'destroy'])->name('education-content.destroy');
// End Education


    //video
    Route::get('/video-content',[Dashboard\VideoContentController::class, 'index'])->name('video-content');
    Route::post('/video-content',[Dashboard\VideoContentController::class, 'store'])->name('video-content.store');
    Route::get('/video-content/{slug}',[Dashboard\VideoContentController::class, 'show'])->name('video-content.show');
    Route::put('/video-content/{slug}',[Dashboard\VideoContentController::class, 'update'])->name('video-content.update');
    Route::delete('/video-content/{slug}',[Dashboard\VideoContentController::class, 'destroy'])->name('video-content.destroy');
    //End video

    // Contact
    Route::get('/contact-content',[Dashboard\ContactContentController::class, 'index'])->name('contact-content');
    Route::put('/contact-content',[Dashboard\ContactContentController::class, 'update'])->name('contact-content.update');
    // End of Contact

    // Faq
    Route::get('/faq-content',[Dashboard\FaqContentController::class, 'index'])->name('faq-content');
    Route::post('/faq-content', [Dashboard\FaqContentController::class, 'store'])->name('faq-content.store');
    Route::get('/faq-content/{id}', [Dashboard\FaqContentController::class, 'show'])->name('faq-content.show');
    Route::put('/faq-content/{id}', [Dashboard\FaqContentController::class, 'update'])->name('faq-content.update');
    Route::delete('/faq-content/{id}', [Dashboard\FaqContentController::class, 'destroy'])->name('faq-content.destroy');
    // End of Faq 

    // Profile Team
    Route::get('/profile-team',[Dashboard\ProfileTeamController::class, 'index'])->name('profile-team');
    Route::post('/profile-team', [Dashboard\ProfileTeamController::class, 'store'])->name('profile-team.store');
    Route::get('/profile-team/{id}', [Dashboard\ProfileTeamController::class, 'show'])->name('profile-team.show');
    Route::put('/profile-team/{id}', [Dashboard\ProfileTeamController::class, 'update'])->name('profile-team.update');
    Route::delete('/profile-team/{id}', [Dashboard\ProfileTeamController::class, 'destroy'])->name('profile-team.destroy');
    //End of Profile Team


    // services-category
    Route::get('/services-category',[Dashboard\ServicesCategoryController::class, 'index'])->name('services-category');
    Route::post('/services-category', [Dashboard\ServicesCategoryController::class, 'store'])->name('services-category.store');
    Route::get('/services-category/{id}',[Dashboard\ServicesCategoryController::class, 'show'])->name('services-category.show');
    Route::put('/services-category/{id}', [Dashboard\ServicesCategoryController::class, 'update'])->name('services-category.update');
    Route::delete('/services-category/{id}', [Dashboard\ServicesCategoryController::class, 'destroy'])->name('services-category.destroy');
    // End of services-category


    // Inbox Contact
    Route::prefix('view-inbox-contact')->group(function() {
        Route::get('/', [Dashboard\InboxContactController::class, 'index'])->name('inbox-contact');
        Route::get('/{id}', [Dashboard\InboxContactController::class, 'show'])->name('inbox-contact.show');
        Route::delete('/{id}', [Dashboard\InboxContactController::class, 'destroy'])->name('inbox-contact.destroy');
    });
    // End Inbox Contact

    
    // change password
    Route::get('/change-password',[Dashboard\ChangePassword::class, 'index'])->name('change-password');
    Route::post('/change-password', [Dashboard\ChangePassword::class, 'update'])->name('password.update');
    // End change password



    // logout
    Route::post('logout',[LoginController::class, 'logout'])->name('logout');

});
