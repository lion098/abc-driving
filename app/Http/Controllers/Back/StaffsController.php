<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Hash, Image, Storage;

class StaffsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staffs = Admin::whereType('Staff')->paginate(10);

        return view('back.staffs.index', compact('staffs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.staffs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:admins,email',
            'new_password' => 'required|confirmed',
            'phone' => 'required|max_digits:30',
            'address' => 'required|string',
            'status' => 'required|in:Active,Inactive',
            'image' => 'required',
            'fb_url' => 'nullable|url',
            'insta_url' => 'nullable|url',
            'twitter_url' => 'nullable|url'
        ]);

        $validated['password'] = Hash::make($validated['new_password']);

        $fileName = $validated['image']->hashName();
        $image = Image::make($validated['image']);

        $image->resize(1280, 720, function($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->encode('jpg');

        Storage::put("public/images/{$fileName}", $image);
        $validated['image'] = $fileName;

        Admin::create($validated);

        flash('Staff Added Successfully.')->success();

        return redirect()->route('cms.staffs.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $staff)
    {
        return view('back.staffs.edit', compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $staff)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'phone' => 'required|max_digits:30',
            'address' => 'required|string',
            'status' => 'required|in:Active,Inactive',
            'image' => 'nullable',
            'fb_url' => 'nullable|url',
            'insta_url' => 'nullable|url',
            'twitter_url' => 'nullable|url'
        ]);

        if (!empty($validated['image'])) {
            Storage::delete('public/images/'.$staff->image);
            $fileName = $validated['image']->hashName();

            $image = Image::make($validated['image']);

            $image->resize(1280, 720, function($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode('jpg');

            Storage::put("public/images/{$fileName}", $image);
            $validated['image'] = $fileName;
        } else {
            $validated['image'] = $staff->image;
        }

        $staff->update($validated);

        flash('Staff Updated')->success();

        return redirect()->route('cms.staffs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $staff)
    {
        $staff->delete();

        flash('Staff Removed.')->success();

        return redirect()->route('cms.staffs.index');
    }
}
