<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $specials = Menu::inRandomOrder()->take(8)->get();

        return view('welcome', compact('specials'));
    }
}
