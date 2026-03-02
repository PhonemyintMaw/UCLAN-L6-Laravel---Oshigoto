<?php

namespace App\Http\Controllers;

use App\Models\CVForms;
use App\Models\partner;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class PartnerController extends Controller
{
    //View Partner Log In Page
    public function login(){
       
        return view('login.login-partner');

    }

    //Authenticate Partner
    public function partnerLogin(Request $request){

        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required',
        ]);

        if (Auth::guard('partner')->attempt($formFields, $request->filled('remember'))) {

            $request->session()->regenerate();
            return redirect('/home') -> with('message', 'You have logged in!');

        }

        return back()->withErrors(['email' => 'Invalid Credentials']) -> onlyInput('email');
    }

    //Partner Log Out
    public function logout(Request $request){

        Auth::guard('partner')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out.');

    }

    //Admin -> Partner Add Page
    public function addNew(){
       
        return view('company.admin-add-partner');

    }

    //Admin -> New Partner Store
    public function store(Request $request){
       
        $formFields = $request->validate([
            'partner_name' => 'required',
            'email'  => ['required', 'email','unique:partners,email'],
            'partner_address'  => 'required',
            'partner_nationality' => 'required',
            'password'  => 'required|min:6',
        ]);

        $formFields['password'] = Hash::make($formFields['password']);

        $partner = partner::create($formFields);

        $prefix = strtoupper(substr($partner -> partner_nationality, 0, 2));
        $partner -> partner_id = 'PT' . $prefix . '-' . 
        str_pad($partner -> id, 3, '0', STR_PAD_LEFT);
        $partner -> save();
        
        return redirect('/all-partners')->with('message', 'Partner Created!');

    }

    //Admin -> Partner Edit Page View
    public function edit($partner_id){

        $partner = partner::where('partner_id', $partner_id)->firstOrFail();

        return view('company.admin-edit-partner', [
            'partner' => $partner
        ]);

    }

    //Admin -> Partner Edit and Update
    public function update(Request $request, $partner_id){

        $partner = partner::where('partner_id', $partner_id)->firstOrFail();

        $formFields = $request->validate([

            'partner_name' => 'required',
            'email'  => ['required', 'email'],
            'partner_address'  => 'required',
            'password' => 'nullable|string|min:6',

        ]);

        //Dont Overwrite with Null Password
        if (!empty($formFields['password'])) {
            $formFields['password'] = Hash::make($formFields['password']);
        } 
        else {
            unset($formFields['password']);
        }

        $partner->update($formFields);

        return back()
        ->with('message', 'Partner Information Updated!');

    }

    //Admin -> View Partner Info
    public function viewPartner($partner_id){

        $partner = partner::where('partner_id', $partner_id)->firstOrFail();
        $cvs = $partner->cvs;

        return view('company.admin-show-partner', [
            'partner' => $partner,
            'cvs' => $cvs
        ]);

    }

    //Admin -> Show All Partners
    public function partner(){

        $filters = request([
            'partner_name',
            'partner_nationality',
            'search'
        ]);

        //filter -> Check Partner Model
        $partners = partner::latest()->filter($filters)->get(); 
        
        return view('company.admin-partner', [

            'partners' => $partners,

        ]);
    }
    
}

