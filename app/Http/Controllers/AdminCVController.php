<?php

namespace App\Http\Controllers;

use App\Models\CVForms;
use App\Models\joblisting;
use App\Models\Partner;
use Database\Factories\PartnerFactory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class AdminCVController extends Controller
{
    //Admin -> Show All CVs
    public function allCV(){

        $filters = request(
            [
            'cv_name',
            'cv_jp_level', 
            'cv_job_type',
            'cv_nationality',
            'job_nationality', 
            'cv_status',
            'search'
            ]);

        $cvs = CVForms::with(['Partner'])
        ->has('partner')->filter($filters)
        ->get();
        
        return view('company.admin-all-cv', [
        'cvs' => $cvs
        ]);

    }

    //Admin -> Show Selected CV
    public  function showCV($cv_code) {

       $cv = CVForms::where('cv_code', $cv_code)->firstOrFail();

        return view('company.admin-show-cv', [
            'cv' => $cv
        ]);

    }

    //Admin -> Show all 'Final Interview Passed' CVs
    public function passedCV(){
       
        $jobs = JobListing::with(['application' => function ($query){
            $query->whereHas('cv', function ($cvQuery)
            {
                $cvQuery->where('cv_status', 'Final-Interview Pass');
            });
        }, 'application.cv.partner'])->get();

        $totalPassed = CVForms::where('cv_status', 'Final-Interview Pass')
        ->count();

        return view('company.admin-completed', [
            'jobs' => $jobs,
            'totalPassed' => $totalPassed
        ]);
    }

    //Admin -> See Evaluate CV Page
    public function seeEvaluate($cv_code){

        $cv = CVForms::where('cv_code', $cv_code)->firstOrFail();

        return view('company.admin-evaluate', [
            'cv' => $cv
        ]);

    }

    //Admin -> Store Evaluated Message
    public function evaluate(Request $request, $cv_code){
         $cv = CVForms::where('cv_code', $cv_code)->firstOrFail();

         $formFields =$request->validate([
            'cv_status' => 'required',
            'cv_evaluation' => 'nullable|string|max:255'
         ]);

         $cv->update($formFields);

            return back()
            ->with('message', 'CV Evaluated!');
    }

}
