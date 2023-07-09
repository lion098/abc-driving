<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Image, Storage;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::paginate(10);

        return view('back.testimonial.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'profession' => 'required|string',
            'desc' => 'required',
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

        Testimonial::create($validated);

        flash('Testimonial Added Successfully.')->success();

        return redirect()->route('cms.testimonial.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonial $testimonial)
    {
        return view('back.testimonial.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'profession' => 'required|string',
            'desc' => 'required',
            'image' => 'nullable'
        ]);

        if (!empty($validated['image'])) {
            Storage::delete('public/images/'.$testimonial->image);
            $fileName = $validated['image']->hashName();

            $image = Image::make($validated['image']);

            $image->resize(1280, 720, function($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode('jpg');

            Storage::put("public/images/{$fileName}", $image);
            $validated['image'] = $fileName;
        } else {
            $validated['image'] = $testimonial->image;
        }

        $testimonial->update($validated);

        flash('Testimonial Updated')->success();

        return redirect()->route('cms.testimonial.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();

        flash('Testimonial Removed.')->success();

        return redirect()->route('cms.testimonial.index');
    }

}
