<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\ContactModel;

class ContactComposer
{
    public function compose(View $view)
    {
        $view->with('contact', ContactModel::first());
    }
}