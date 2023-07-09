<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class CompletedDaysController extends Controller
{
    public function addDay($id)
    {
        $client = Client::whereId($id)->first();

        $addedDay = $client->completed_days + 1;

        $client->update(['completed_days' => $addedDay]);

        flash('Day Added Successfully')->success();

        return redirect()->back();
    }

    public function subtractDay($id)
    {
        $client = Client::whereId($id)->first();

        $addedDay = $client->completed_days - 1;

        $client->update(['completed_days' => $addedDay]);

        flash('Day Subtracted Successfully')->success();

        return redirect()->back();
    }
}
