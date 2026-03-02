<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class AdminUserController extends Controller
{
    //View Admin Log In Page
    public function login(){
        return view('login.login-admin');
    }

    //Authenticate Admin
    public function adminLogin(Request $request){

        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required',
        ]);

        if (Auth::guard('web')->attempt($formFields, $request->filled('remember'))) {

            $request->session()->regenerate();
            return redirect('/admin-home') -> with('message', 'You have logged in!');

        }

        return back()->withErrors(['email' => 'Invalid Credentials']) -> onlyInput('email');
    }

    //Admin Log Out
    public function logout(Request $request){

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken(); 

        return redirect('/')->with('message', 'You Have Been Logged Out');
        
    }
    
}
