<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;

class SlideController extends Controller
{
    public function index()
    {
        $slides = Slide::where('active', 1)->get();
        return view('slide', compact('slides'));
    }
}