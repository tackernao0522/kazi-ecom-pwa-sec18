<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeSlider;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

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

    public function storeSlider(Request $request)
    {
        $request->validate([
            'slider_image' => 'required',
        ], [
            'slider_image.required' => 'Uploade slider Image',
        ]);

        $image = $request->file('slider_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalName();
        Image::make($image)->resize(1024, 379)->save('upload/slider/' . $name_gen);
        $save_url = 'http://localhost/upload/slider/' . $name_gen;

        HomeSlider::insert([
            'slider_image' => $save_url,
        ]);

        $notification = array(
            'message' => 'Slider Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.slider')->with($notification);
    }

    public function editSlider($id)
    {
        $slider = HomeSlider::findOrFail($id);

        return view('backend.slider.slider_edit', compact('slider'));
    }

    public function updateSlider(Request $request, $id)
    {
        $slider = HomeSlider::findOrFail($id);

        $image = $request->file('slider_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalName();
        Image::make($image)->resize(1024, 379)->save('upload/slider/' . $name_gen);
        $save_url = 'http://localhost/upload/slider/' . $name_gen;

        $slider->slider_image = $save_url;
        $slider->update();

        $notification = array(
            'message' => 'Slider Updated Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('all.slider')->with($notification);
    }

    public function deleteSlider($id)
    {
        $slider = HomeSlider::findOrFail($id);
        $slider->delete();

        $notification = array(
            'message' => 'Slider Deleted Successfully',
            'alert-type' => 'error',
        );

        return redirect()->back()->with($notification);
    }
}
