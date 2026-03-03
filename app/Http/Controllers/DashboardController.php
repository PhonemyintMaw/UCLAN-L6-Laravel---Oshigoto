<?php

namespace App\Http\Controllers;

use App\Models\CVForms;
use App\Models\joblisting;
use App\Models\partner;
use App\Models\Application;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //Admin -> Default Home Page -> Dashboard
    public function home(){

        $totalCVs = CVForms::count();
        $totalJobs = joblisting::count();
        $totalPartners = partner::count();
        $totalApplications = Application::count();
        $totalPassed = CVForms::where('cv_status', 'Final-Interview Pass')->count();

        $start = null;
        $end = null;
        $cvs = null;
        $partners = null;
        $applications = null;
        $jobs = null;

        return view('company.admin-home', [
            'totalCVs' => $totalCVs,
            'totalPartners' => $totalPartners,
            'totalJobs' => $totalJobs,
            'totalApplications' => $totalApplications,
            'totalPassed' => $totalPassed,
            'start' => $start,
            'end' => $end,
            'cvs' => $cvs,
            'jobs' => $jobs,
            'partners' => $partners,
            'applications' => $applications,
        ]);
    }

    //Admin -> Default Home Page -> Barchart
    public function jobsbytype(){
        
        return Cache::remember('chart_jobs_by_type', 60, function() {
            return JobListing::selectRaw('job_type, COUNT(*) as count')
                ->groupBy('job_type')
                ->get();
        });

    }

    //Admin -> Default Home Page -> Partner Pie Chart
    public function partnersbynationality(){

        return Cache::remember('chart_partners_by_nationality', 60, function () {
            return Partner::selectRaw('partner_nationality, COUNT(*) as count')
                ->groupBy('partner_nationality')
                ->get();
        });

    }

    //Admin -> Default Home Page -> CV Pie Chart
    public function cvsbynationality(){

        return CVForms::selectRaw('cv_nationality, COUNT(*) as count')
            ->groupBy('cv_nationality')
            ->get();

    }
    
    //Admin -> Default Home Page -> Statistics
    public function statistics(){

        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        $stats = [

            'cv' => [
                'monthly' => CVForms::whereMonth('created_at', $currentMonth)
                                    ->whereYear('created_at', $currentYear)
                                    ->count(),
                'yearly' =>  CVForms::whereYear('created_at', $currentYear)
                                    ->count(),
            ],

            'job' => [
                'monthly' => joblisting::whereMonth('created_at', $currentMonth)
                                    ->whereYear('created_at', $currentYear)
                                    ->count(),
                'yearly' =>  joblisting::whereYear('created_at', $currentYear)
                                    ->count(),
            ],


            'partner' => [
                'monthly' => partner::whereMonth('created_at', $currentMonth)
                                    ->whereYear('created_at', $currentYear)
                                    ->count(),
                'yearly' =>  partner::whereYear('created_at', $currentYear)
                                    ->count(),
            ],

            'application' => [
                'monthly' => Application::whereMonth('created_at', $currentMonth)
                                    ->whereYear('created_at', $currentYear)
                                    ->count(),
                'yearly' =>  Application::whereYear('created_at', $currentYear)
                                    ->count(),
            ],

        ];

        return response()->json($stats);

    }

    //Admin -> Date Filter
    public function dateFilter(Request $request){

        $request -> validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date'
        ]);

        $start = $request -> start_date;
        $end = $request -> end_date;
        
        $cvs = CVForms::whereBetween('created_at', [$start, $end])->count();
        $jobs = joblisting::whereBetween('created_at', [$start, $end])->count();
        $partners = partner::whereBetween('created_at', [$start, $end])->count();
        $applications = Application::whereBetween('created_at', [$start, $end])->count();

        $totalCVs = CVForms::count();
        $totalJobs = joblisting::count();
        $totalPartners = partner::count();
        $totalApplications = Application::count();
        $totalPassed = CVForms::where('cv_status', 'Final-Interview Pass')->count();

        return view('company.admin-home', [
            'totalCVs' => $totalCVs,
            'totalPartners' => $totalPartners,
            'totalJobs' => $totalJobs,
            'totalApplications' => $totalApplications,
            'totalPassed' => $totalPassed,
            'start' => $start,
            'end' => $end,
            'cvs' => $cvs,
            'jobs' => $jobs,
            'partners' => $partners,
            'applications' => $applications,
        ]);
    }
}

