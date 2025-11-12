<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log; // Perbaikan penggunaan Log
// \Log::info('Language switched to: ' . $lang);

class LanguageController extends Controller
{
    public function switchLang($lang)
    {
        if (array_key_exists($lang, config('app.available_locales'))) {
            session(['locale' => $lang]);
            app()->setLocale($lang);
        }
        return redirect()->back();
    }
}
