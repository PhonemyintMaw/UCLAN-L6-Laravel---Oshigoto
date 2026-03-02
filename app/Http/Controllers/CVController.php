<?php

namespace App\Http\Controllers;

use App\Models\CVForms;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class CVController extends Controller
{
    //Partner -> Default Home Page -> Shows CV Forms Created by Partner
    public function index(){

        $filters = request(
            [
            'cv_name',
            'search'
            ]);
        
        $partnerID = auth('partner')->id();
        
        $cvs = CVForms::where('partner_id', $partnerID)->latest()
        ->filter($filters)->get();

        $passed = CVForms::where('partner_id', $partnerID)->where('cv_status', 
        'Final-Interview Pass')->count();

        $total = $cvs->count();

        return view('partner.partner-home', [
        'cvs' => $cvs,
        'total' => $total,
        'passed' => $passed,
        ]);

    }

    //Partner -> View Single CV
    public  function viewcv($cv_code) {

       $cv = CVForms::where('cv_code', $cv_code)->firstOrFail();

        return view('partner.partner-view-cv', [
            'cv' => $cv
        ]);

    }
    
    //Partner -> Edit Single CV
    public  function edit($cv_code) {

        $cv = CVForms::where('cv_code', $cv_code)->firstOrFail();

        return view('partner.partner-edit-cv', [
            'cv' => $cv
        ]);

    }

    //Partner -> Update the Edited CV
    public  function update(Request $request, $cv_code) {

        $cv = CVForms::where('cv_code', $cv_code)->firstOrFail();

        $formFields = $request->validate([

            'cv_profile' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            'cv_name'        => 'required|string|max:255',
            'cv_age'         => 'required|integer|min:15|max:100',
            'cv_dob'         => 'required|date',
            'cv_address'     => 'required|string|max:255',
            'cv_religion'    => 'required|string|max:100',
            'cv_marriage'    => 'required|string|max:50',
            'cv_job_type'    => 'required|string|max:255',
            'cv_job_certificate' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
            'cv_jp_level' => 'required|string|max:50',
            'cv_jp_certificate' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
            'cv_jp_study_year'   => 'required|integer|min:0|max:50',
            'cv_jp_study_month'  => 'required|integer|min:0|max:11',
            'cv_desired_work_length' => 'required|string|max:100',

            //SCHOOL HISTORY
            'cv_schoolhistory1_name'    => 'required|string|max:255',
            'cv_schoolhistory1_subject' => 'required|string|max:255',
            'cv_schoolhistory1_start'   => 'required|date',
            'cv_schoolhistory1_end'     => 'required|date|after_or_equal
            :cv_schoolhistory1_start',
            'cv_schoolhistory1_status'  => 'required|string|max:100',

            'cv_schoolhistory2_name'    => 'nullable|string|max:255',
            'cv_schoolhistory2_subject' => 'nullable|string|max:255',
            'cv_schoolhistory2_start'   => 'nullable|date',
            'cv_schoolhistory2_end'     => 'nullable|date|after_or_equal
            :cv_schoolhistory2_start',
            'cv_schoolhistory2_status'  => 'nullable|string|max:100',

            'cv_schoolhistory3_name'    => 'nullable|string|max:255',
            'cv_schoolhistory3_subject' => 'nullable|string|max:255',
            'cv_schoolhistory3_start'   => 'nullable|date',
            'cv_schoolhistory3_end'     => 'nullable|date|after_or_equal
            :cv_schoolhistory3_start',
            'cv_schoolhistory3_status'  => 'nullable|string|max:100',

            //JOB HISTORY
            'cv_jobhistory1_name'     => 'nullable|string|max:255',
            'cv_jobhistory1_position' => 'nullable|string|max:255',
            'cv_jobhistory1_start'    => 'nullable|date',
            'cv_jobhistory1_end'      => 'nullable|date|after_or_equal
            :cv_jobhistory1_start',
            'cv_jobhistory1_status'   => 'nullable|string|max:100',

            'cv_jobhistory2_name'     => 'nullable|string|max:255',
            'cv_jobhistory2_position' => 'nullable|string|max:255',
            'cv_jobhistory2_start'    => 'nullable|date',
            'cv_jobhistory2_end'      => 'nullable|date|after_or_equal
            :cv_jobhistory2_start',
            'cv_jobhistory2_status'   => 'nullable|string|max:100',

            'cv_jobhistory3_name'     => 'nullable|string|max:255',
            'cv_jobhistory3_position' => 'nullable|string|max:255',
            'cv_jobhistory3_start'    => 'nullable|date',
            'cv_jobhistory3_end'      => 'nullable|date|after_or_equal
            :cv_jobhistory3_start',
            'cv_jobhistory3_status'   => 'nullable|string|max:100',

            //OTHERS
            'cv_email' => 'nullable|email|max:255',
            'cv_phone' => 'nullable|string|max:20',

            'cv_passport_number' => 'nullable|string|max:50',
            'cv_passport_date'   => 'nullable|date',
            'cv_passport'        => 'nullable|file|mimes:pdf,doc,docx|max:5120',
            'cv_jp_visit_time' => 'nullable|integer|min:0|max:50',
            'cv_COE_Received'  => 'nullable|integer|min:0|max:50',
            'cv_COE_Rejected'  => 'nullable|integer|min:0|max:50',

        ]);

        if ($request->hasFile('cv_profile')) {
        $formFields['cv_profile'] = $request->file('cv_profile')
        ->store('cv/cv_profile', 'public');
        }

        if ($request->hasFile('cv_job_certificate')) {
            $formFields['cv_job_certificate'] = $request->file('cv_job_certificate')
            ->store('cv/job_certificates', 'public');
        }

        if ($request->hasFile('cv_jp_certificate')) {
            $formFields['cv_jp_certificate'] = $request->file('cv_jp_certificate')
            ->store('cv/jp_certificates', 'public');
        }

        if ($request->hasFile('cv_passport')) {
            $formFields['cv_passport'] = $request->file('cv_passport')
            ->store('cv/passports', 'public');
        }

        $cv->update($formFields);

        return back()
        ->with('message', 'CV Updated!');

    }

    //Partner -> View Create New CV Page
    public function create() {

        return view('partner.partner-new-cv-register');

    }

    //Partner -> Store New CV
    public function store(Request $request) {

        $formFields = $request->validate([

            'cv_profile' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            'cv_name'        => 'required|string|max:255',
            'cv_gender'      => 'required|string|max:10',
            'cv_age'         => 'required|integer|min:15|max:100',
            'cv_dob'         => 'required|date',
            'cv_nationality' => 'required|string|max:100',
            'cv_address'     => 'required|string|max:255',
            'cv_religion'    => 'required|string|max:100',
            'cv_marriage'    => 'required|string|max:50',
            'cv_job_type'    => 'required|string|max:255',
            'cv_job_certificate' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
            'cv_jp_level' => 'required|string|max:50',
            'cv_jp_certificate' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
            'cv_jp_study_year'   => 'required|integer|min:0|max:50',
            'cv_jp_study_month'  => 'required|integer|min:0|max:11',
            'cv_desired_work_length' => 'required|string|max:100',

            //SCHOOL HISTORY
            'cv_schoolhistory1_name'    => 'required|string|max:255',
            'cv_schoolhistory1_subject' => 'required|string|max:255',
            'cv_schoolhistory1_start'   => 'required|date',
            'cv_schoolhistory1_end'     => 'required|date|after_or_equal:cv_schoolhistory1_start',
            'cv_schoolhistory1_status'  => 'required|string|max:100',

            'cv_schoolhistory2_name'    => 'nullable|string|max:255',
            'cv_schoolhistory2_subject' => 'nullable|string|max:255',
            'cv_schoolhistory2_start'   => 'nullable|date',
            'cv_schoolhistory2_end'     => 'nullable|date|after_or_equal:cv_schoolhistory2_start',
            'cv_schoolhistory2_status'  => 'nullable|string|max:100',

            'cv_schoolhistory3_name'    => 'nullable|string|max:255',
            'cv_schoolhistory3_subject' => 'nullable|string|max:255',
            'cv_schoolhistory3_start'   => 'nullable|date',
            'cv_schoolhistory3_end'     => 'nullable|date|after_or_equal:cv_schoolhistory3_start',
            'cv_schoolhistory3_status'  => 'nullable|string|max:100',

            //JOB HISTORY
            'cv_jobhistory1_name'     => 'nullable|string|max:255',
            'cv_jobhistory1_position' => 'nullable|string|max:255',
            'cv_jobhistory1_start'    => 'nullable|date',
            'cv_jobhistory1_end'      => 'nullable|date|after_or_equal:cv_jobhistory1_start',
            'cv_jobhistory1_status'   => 'nullable|string|max:100',

            'cv_jobhistory2_name'     => 'nullable|string|max:255',
            'cv_jobhistory2_position' => 'nullable|string|max:255',
            'cv_jobhistory2_start'    => 'nullable|date',
            'cv_jobhistory2_end'      => 'nullable|date|after_or_equal:cv_jobhistory2_start',
            'cv_jobhistory2_status'   => 'nullable|string|max:100',

            'cv_jobhistory3_name'     => 'nullable|string|max:255',
            'cv_jobhistory3_position' => 'nullable|string|max:255',
            'cv_jobhistory3_start'    => 'nullable|date',
            'cv_jobhistory3_end'      => 'nullable|date|after_or_equal:cv_jobhistory3_start',
            'cv_jobhistory3_status'   => 'nullable|string|max:100',

            //OTHERS
            'cv_email' => 'nullable|email|max:255',
            'cv_phone' => 'nullable|string|max:20',

            'cv_passport_number' => 'nullable|string|max:50',
            'cv_passport_date'   => 'nullable|date',
            'cv_passport'        => 'nullable|file|mimes:pdf,doc,docx|max:5120',
            'cv_jp_visit_time' => 'nullable|integer|min:0|max:50',
            'cv_COE_Received'  => 'nullable|integer|min:0|max:50',
            'cv_COE_Rejected'  => 'nullable|integer|min:0|max:50',

        ]);

        if ($request->hasFile('cv_profile')) {
        $formFields['cv_profile'] = $request->file('cv_profile')
        ->store('cv/cv_profile', 'public');
        }

        if ($request->hasFile('cv_job_certificate')) {
            $formFields['cv_job_certificate'] = $request->file('cv_job_certificate')
            ->store('cv/job_certificates', 'public');
        }

        if ($request->hasFile('cv_jp_certificate')) {
            $formFields['cv_jp_certificate'] = $request->file('cv_jp_certificate')
            ->store('cv/jp_certificates', 'public');
        }

        if ($request->hasFile('cv_passport')) {
            $formFields['cv_passport'] = $request->file('cv_passport')
            ->store('cv/passports', 'public');
        }

        $formFields['partner_id'] = auth('partner')->id();

        $cv = CVForms::create($formFields);

        $cv->cv_code = 'CV-' . str_pad($cv->id, 4, '0', STR_PAD_LEFT);
        $cv->save();
        
        return redirect('/home')->with('message', 'CV Created!');

    }

}

