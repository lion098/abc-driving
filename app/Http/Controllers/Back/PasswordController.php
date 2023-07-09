<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash, Auth;

class PasswordController extends Controller
{
    public function edit()
    {
        return view('back.password.edit');
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'old_password' => 'required|current_password:cms',
            'new_password' => 'required|confirmed'
        ], [
            'old_password.current_password' => 'The old password is incorrect.'
        ]);

        $validated['password'] = Hash::make($validated['new_password']);

        Auth::guard('cms')->user()->update($validated);

        flash('Password Updated.')->success();

        return redirect()->route('cms.password.edit');
    }
}
