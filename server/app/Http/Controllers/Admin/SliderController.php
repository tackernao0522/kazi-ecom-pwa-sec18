<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeSlider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function allSlider()
    {
        $result = HomeSlider::all();

        return $result;
    }

    public function getAllSlider()
    {
        $sliders = HomeSlider::latest()->get();

        return view('backend.slider.slider_view', compact('sliders'));
    }

    public function addSlider()
    {
        return view('backend.slider.slider_add');
    }
}
