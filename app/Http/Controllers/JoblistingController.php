<?php

namespace App\Http\Controllers;

use App\Models\joblisting;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class JoblistingController extends Controller
{

    //Partner -> View All Jobs
    public function joblist(){

        $partner = auth('partner')->user();

        $filters = request(
            ['job_type', 
            'job_title',
            'required_jp_level', 
            'search']);

        //forPartner, filter -> Check joblisting Model
        $jobs = joblisting::query()->forPartner($partner)
        ->where('job_availability', 'Available')
        ->latest() -> filter($filters) -> Paginate(6);

        return view('partner.partner-all-jobs', [

            'jobs' => $jobs
        
        ]);

    }

    //Partner -> View Job
    public function viewjob($job_code){

        $job = joblisting::where('job_code', $job_code)->firstOrFail();

        return view('partner.partner-view-job', [
            'job' => $job
        ]);

    }

}

