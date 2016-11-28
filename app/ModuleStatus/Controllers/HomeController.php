<?php

namespace App\ModuleStatus\Controllers;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function home()
    {
        return view('welcome', ['title' => 'Can I upgrade to Drupal 8?']);
    }
}
