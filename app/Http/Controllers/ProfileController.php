<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Controller;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Show the user profile form.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('profile.edit', [
            'user' => Auth::user()
        ]);
    }
    
    /**
     * Update the user's profile.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        $user = Auth::user();
        $user->name = $request->name;
        
        if ($request->hasFile('avatar')) {
            // Delete the old avatar if it exists
            if ($user->avatar) {
                $oldAvatarPath = str_replace('storage/', 'public/', $user->avatar);
                Storage::delete($oldAvatarPath);
            }
            
            // Save the new avatar
            $avatar = $request->file('avatar');
            $filename = time() . '_' . $avatar->getClientOriginalName();
            $avatarPath = $avatar->storeAs('avatars', $filename, 'public');
            $user->avatar = 'storage/' . $avatarPath;
        }
        
        $user->save();
        
        return redirect()->route('profile.edit')->with('status', 'Profile updated successfully!');
    }
}
