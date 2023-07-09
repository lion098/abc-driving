<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Image, Storage;
use Illuminate\Pagination\Paginator;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $slider = Slider::paginate(10);
        return view('back.slider.index', compact('slider'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'image' => 'required'
        ]);

        $fileName = $validated['image']->hashName();
        $image = Image::make($validated['image']);

        $image->resize(1280, 720, function($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->encode('jpg');

        Storage::put("public/images/{$fileName}", $image);
        $validated['image'] = $fileName;

        Slider::create($validated);

        flash('Slider Added Successfully.')->success();

        return redirect()->route('cms.slider.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        return view('back.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'image' => 'nullable'
        ]);

        if (!empty($validated['image'])) {
            Storage::delete('public/images/'.$slider->image);
            $fileName = $validated['image']->hashName();

            $image = Image::make($validated['image']);

            $image->resize(1280, 720, function($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode('jpg');

            Storage::put("public/images/{$fileName}", $image);
            $validated['image'] = $fileName;
        } else {
            $validated['image'] = $slider->image;
        }

        $slider->update($validated);

        flash('Slider Updated')->success();

        return redirect()->route('cms.slider.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();

        flash('Slider Removed.')->success();

        return redirect()->route('cms.slider.index');
    }
}
