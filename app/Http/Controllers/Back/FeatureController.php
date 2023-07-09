<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $features = Feature::paginate(10);

        return view('back.feature.index', compact('features'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.feature.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'desc' => 'required'
        ]);

        Feature::create($validated);

        flash('Feature Added Successfully.')->success();

        return redirect()->route('cms.feature.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Feature $feature)
    {
        return view('back.feature.edit', compact('feature'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Feature $feature)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'desc' => 'required'
        ]);

        $feature->update($validated);

        flash('Feature Updated')->success();

        return redirect()->route('cms.feature.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feature $feature)
    {
        $feature->delete();

        flash('Feature Removed.')->success();

        return redirect()->route('cms.feature.index');
    }
}
