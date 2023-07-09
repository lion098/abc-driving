<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
    public function index()
    {
        $siteSetting = SiteSetting::first();
        return view('back.site-setting.index', compact('siteSetting'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'address' => 'required|string',
            'timing' => 'required|string',
            'contact' => 'required|string',
            'email' => 'required|string',
            'fb_url' => 'required|string',
            'insta_url' => 'required|string',
            'youtube_url' => 'required|string',
            'google_map' => 'required'
        ]);
        $siteSetting = SiteSetting::first();
        
        $siteSetting->update($validated);

        flash('Site Setting Updated')->success();

        return redirect()->route('cms.sitesetting.index');
    }
}
