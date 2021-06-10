<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Support\Facades\Auth;

class ChangePasswordController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }



    /**
     * Go back to the profile page after changing password
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function change(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        if(User::find(Auth::id())->update(['password'=> Hash::make($request->new_password)])) {
            return redirect()->back()->with('success', 'Great! You have successfully changed your password');
        }


    }


}
