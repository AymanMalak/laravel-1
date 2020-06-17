<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    public function lang($locale)
    {
        // for project multi language
        App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }
}
