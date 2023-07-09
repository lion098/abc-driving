<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\{Client, Course};
use Illuminate\Http\Request;
use Image, Storage, Str;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::latest()->paginate(10);

        return view('back.clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|max_digits:30',
            'client_address' => 'required|string',
            'course_id' => 'required',
            'image' => 'required',
            'from_time' => 'required|string',
            'to_time' => 'required|string'
        ]);

        $fileName = $validated['image']->hashName();
        $image = Image::make($validated['image']);

        $image->resize(1280, 720, function($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->encode('jpg');

        Storage::put("public/images/{$fileName}", $image);
        $validated['image'] = $fileName;
        $validated['completed_days'] = 0;
        $validated['slug'] = Str::slug($validated['client_name']) . '-' . time();

        Client::create($validated);

        flash('Client Added Successfully.')->success();

        return redirect()->route('cms.clients.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return view('back.clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        $validated = $request->validate([
            'client_name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|max_digits:30',
            'client_address' => 'required|string',
            'course_id' => 'required',
            'image' => 'nullable',
            'from_time' => 'required|string',
            'to_time' => 'required|string'
        ]);

        if (!empty($validated['image'])) {
            Storage::delete('public/images/'.$client->image);
            $fileName = $validated['image']->hashName();

            $image = Image::make($validated['image']);

            $image->resize(1280, 720, function($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode('jpg');

            Storage::put("public/images/{$fileName}", $image);
            $validated['image'] = $fileName;
        } else {
            $validated['image'] = $client->image;
        }
        $validated['slug'] = $client->slug;

        $client->update($validated);

        flash('Client Updated')->success();

        return redirect()->route('cms.clients.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client->delete();

        flash('client Removed.')->success();

        return redirect()->route('cms.clients.index');
    }
}
