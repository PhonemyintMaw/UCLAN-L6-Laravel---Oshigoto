<?php

namespace App\Http\Controllers;

use App\Models\joblisting;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class AdminJoblistingController extends Controller
{
    //Admin -> Show All Jobs
    public function joblistAdmin(){

        $filters = request(
            [
            'company_name',
            'job_type', 
            'job_title',
            'required_jp_level',
            'job_nationality', 
            'search'
            ]);

        //filters -> Check joblisting Model
        $jobs = joblisting::latest()-> filter($filters)->get(); 
        
        return view('company.admin-job', [

            'jobs' => $jobs,
        
        ]);

    }

    //Admin -> Show Selected Job
    public function viewjobAdmin($job_code){

        $job = joblisting::where('job_code', $job_code)->firstOrFail();

       
        return view('company.admin-show-job', [
            'job' => $job
        ]);

    }

    //Admin -> Edit Selected Job
    public function edit($job_code){

        $job = joblisting::where('job_code', $job_code)->firstOrFail();

       
        return view('company.admin-edit-job', [
            'job' => $job
        ]);

    }

    //Admin -> Update Edited Job
    public function update(Request $request, $job_code){

        $job = joblisting::where('job_code', $job_code)->firstOrFail();

        $formFields = $request->validate([
            'recruit_number' => 'required',
            'application_deadline' => 'required',
            'company_name' => 'required',
            'company_website' => 'required',
            'company_location' => 'required',
            'job_title' => 'required',
            'job_description' => 'required',
            'work_time' => 'required',
            'off_days' => 'required',
            'salary_benefits' => 'required',
            'deductables' => 'required',
            'after_deduction' => 'required',
            'airticket_exp' => 'required',
            'required_jp_level' => 'required',
            'age_range' => 'required',
            'job_gender' => 'required',
            'job_nationality' => 'required',
            'other_requirements' => 'required',
            'job_availability' => 'required'
        ]);

        $job->update($formFields);

        return back()
        ->with('message', 'Job Updated!');

    }

    //Admin -> View Add New Job Page
    public function add(){

        return view('company.admin-add-new-job');
  
    }

    //Admin -> Store Added New Job Data
    public function store(Request $request){

        $formFields = $request->validate([
            'job_type' => 'required',
            'recruit_number' => 'required',
            'application_deadline' => 'required',
            'company_name' => 'required',
            'company_website' => 'required',
            'company_location' => 'required',
            'job_title' => 'required',
            'job_description' => 'required',
            'work_time' => 'required',
            'off_days' => 'required',
            'salary_benefits' => 'required',
            'deductables' => 'required',
            'after_deduction' => 'required',
            'airticket_exp' => 'required',
            'required_jp_level' => 'required',
            'age_range' => 'required',
            'job_gender' => 'required',
            'job_nationality' => 'required',
            'other_requirements' => 'required',
        ]);

        $jobs = joblisting::create($formFields);
        $prefix = strtoupper(substr($jobs -> job_type, 0, 3));

        $jobs->job_code = 'JOB - ' . 
        str_pad($jobs->id, 4, '0', STR_PAD_LEFT) . ' - ' . $prefix;
        
        $jobs->save();

        return redirect('/all-listed-jobs')
        ->with('message', 'Job Created!');

    }
    
}

