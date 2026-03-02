<?php

namespace App\Http\Controllers;


use App\Models\application;
use App\Models\CVForms;
use App\Models\joblisting;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{

    //Partner -> View Apply Job Page
    public function viewapplyjob($job_code){

        $partnerId = auth('partner')->id();

        $job = joblisting::where('job_code', $job_code)->firstOrFail();

        $availableCvs = CVForms::Where('partner_id', $partnerId)
        ->where('cv_status', 'Not Applied')
        ->where('cv_job_type', $job->job_type)
        ->get();

        $appliedCvs = $job->cvs()->where('partner_id', $partnerId)->get();

        return view('partner.partner-job-application', [
            'job' => $job,
            'availableCvs' => $availableCvs,
            'appliedCvs' => $appliedCvs
        ]);

    }

    //Partner -> Add CV in Apply Job Page
    public function addCV($job_id, $cv_id){

        $cv = CVForms::where('id', $cv_id)->where('cv_status', 'Not Applied')
            ->first();

        Application::create([
            'job_id' => $job_id,
            'cv_id' => $cv_id,
        ]);

        $cv->update(['cv_status' => 'Applied']);

        return back()->with('message', $cv->cv_name . ' added to job successfully!');

    }

    //Partner -> Remove CV in Apply Job Page
    public function removeCV($job_id, $cv_id){

        $application = Application::where('job_id', $job_id)
            ->where('cv_id', $cv_id)
            ->first();

        if (!$application) {
            return back()->with('error', 'Application not found.');
        }

        $application->delete();

        $cv = CVForms::find($cv_id);
        $cv->update(['cv_status' => 'Not Applied']);

        return back()->with('message', $cv->cv_name . ' removed from job successfully!');

    }

    //Partner -> View Applied CVs and Job
    public function appliedCV(){

        $partnerId = auth('partner')->id();

        $filters = request([
            'job_code',
            'company_name',
            'search'
        ]);
       
        $jobs = JobListing::whereHas('application.cv', function ($query) use ($partnerId) 
                {
                    $query->where('partner_id', $partnerId);
                })
                ->with(['application' => function ($query) use ($partnerId) {
                    $query->whereHas('cv', function ($q) use ($partnerId) 
                    {
                    $q->where('partner_id', $partnerId);
                    })
                    ->with('cv');
                }])
                ->latest()->filter($filters)->paginate(5);

        return view('partner.partner-applied-job', [
            'jobs' => $jobs
        ]);

    }

    //Admin -> View Applied CVs and Jobs
    public function AdminAppliedCV(){
       
        $filters = request([
            'job_code',
            'company_name',
            'search'
        ]);

        $jobs = JobListing::with(['application.cv'])
        ->has('application')->latest()
        ->filter($filters)->paginate(5);

        return view('company.admin-application', [
            'jobs' => $jobs
        ]);

    }

}
