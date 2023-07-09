<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use Storage, Image;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about = About::paginate(10);

        return view('back.about-us.index', compact('about'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(About $about)
    {
        return view('back.about-us.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, About $about)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'required',
            'image' => 'nullable'
        ]);

        if (!empty($validated['image'])) {
            Storage::delete('public/images/'.$about->image);
            $fileName = $validated['image']->hashName();

            $image = Image::make($validated['image']);

            $image->resize(1280, 720, function($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode('jpg');

            Storage::put("public/images/{$fileName}", $image);
            $validated['image'] = $fileName;
        } else {
            $validated['image'] = $about->image;
        }

        $about->update($validated);

        flash('About Us Updated')->success();

        return redirect()->route('cms.about.index');
    }
}
