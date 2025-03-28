<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Auth;

class ProfileController extends Controller
{
    public function show()
    {
        return view('auth.profile');
    }

    public function update(ProfileUpdateRequest $request)
    {        
        // Task: fill in the code here to update name and email
        // Also, update the password if it is set
                
        /** @var \App\Models\User $user **/
        
        $user = auth()->user();
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->filled('password')){
            $user->password = bcrypt($request->password);
        }
        $user->save();

        return redirect()->route('profile.show')->with('success', 'Profile updated.');
    }
}
