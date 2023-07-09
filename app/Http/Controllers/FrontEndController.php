<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use DB;

class FrontEndController extends Controller
{
    public function index()
    {
        $sliders = DB::table('sliders')->get();
        $about = DB::table('abouts')->first();
        $features = DB::table('features')->get();
        $courses = DB::table('courses')->get();
        $staffs = DB::table('admins')->whereType('Staff')->limit(4)->get();
        $testimonials = DB::table('testimonials')->get();

        $data = [
            'sliders' => $sliders,
            'about' => $about,
            'features' => $features,
            'courses' => $courses,
            'staffs' => $staffs,
            'testimonials' => $testimonials
        ];
        return view('front.index', $data);
    }

    public function aboutUs()
    {
        $about = DB::table('abouts')->first();
        $features = DB::table('features')->get();
        return view('front.about-us', compact('about', 'features'));
    }

    public function courses()
    {
        $courses = DB::table('courses')->get();
        return view('front.courses', compact('courses'));
    }

    public function features()
    {
        $features = DB::table('features')->get();
        $about = DB::table('abouts')->first();
        return view('front.feature', compact('features', 'about'));
    }

    public function teams()
    {
        $teams = DB::table('admins')->whereType('Staff')->get();
        return view('front.team', compact('teams'));
    }

    public function contact()
    {
        return view('front.contact');
    }

    public function client()
    {
        $clients = DB::table('clients')->get();
        return view('front.client', compact('clients'));
    }

    public function clientInner($slug)
    {
        $client = Client::whereSlug($slug)->first();
        return view('front.client-inner', compact('client'));
    }

    public function searchClient(Request $request)
    {
        $clients = Client::where('client_name', 'LIKE', "%$request->search%")->get();
        return view('front.client', compact('clients'));
    }
}
