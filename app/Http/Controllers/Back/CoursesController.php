<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use Image, Storage;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allCourses = Course::paginate(10);

        return view('back.courses.index', compact('allCourses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'course_name' => 'required|string',
            'course_type' => 'required|string',
            'days' => 'required|string',
            'price' => 'required|string',
            'short_desc' => 'required',
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

        Course::create($validated);

        flash('Course Added Successfully.')->success();

        return redirect()->route('cms.courses.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        return view('back.courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            'course_name' => 'required|string',
            'course_type' => 'required|string',
            'days' => 'required|string',
            'price' => 'required|string',
            'short_desc' => 'required',
            'image' => 'nullable'
        ]);

        if (!empty($validated['image'])) {
            Storage::delete('public/images/'.$course->image);
            $fileName = $validated['image']->hashName();

            $image = Image::make($validated['image']);

            $image->resize(1280, 720, function($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode('jpg');

            Storage::put("public/images/{$fileName}", $image);
            $validated['image'] = $fileName;
        } else {
            $validated['image'] = $course->image;
        }

        $course->update($validated);

        flash('Course Updated')->success();

        return redirect()->route('cms.courses.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();

        flash('Course Removed.')->success();

        return redirect()->route('cms.courses.index');
    }
}
