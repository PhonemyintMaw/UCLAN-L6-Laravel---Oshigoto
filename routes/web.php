<?php

use App\Http\Controllers\CVController;
use App\Http\Controllers\JoblistingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminJoblistingController;
use App\Http\Controllers\AdminCVController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cache;
use App\Models\CVForms;
use App\Models\joblisting;
use App\Models\Partner;


//Log In Log Out

// Log IN CHOOSE Page
Route::get('/', function () {
    return view('login.login-choose');
});

// Log IN ADMIN Page
Route::get('/admin-login', [AdminUserController::class, 'login']);

// Log IN ADMIN Page ROUTE
Route::post('/admin/authenticate', [AdminUserController::class, 'adminLogin']);

// Log OUT ADMIN
Route::post('/admin/logout', [AdminUserController::class, 'logout']);

// Log IN PARTNER Page view
Route::get('/partner-login', [PartnerController::class, 'login']);

// Log IN PARTNER Page ROUTE
Route::post('/partner/authenticate', [PartnerController::class, 'partnerLogin']);

// Log OUT PARTNER
Route::post('/partner/logout', [PartnerController::class, 'logout']);


//////////////////////////////////////////////////////////////////////////////////////


//Partner Side

// PARTNER CV

// Partner Full CV List
Route::get('/home', [CVController::class, 'index']);

// Partner CV View
Route::get('/partner-view-cv/{cv_code}', [CVController::class, 'viewcv']);

// Partner CV Edit FORM
Route::get('/partner-view-cv/{cv_code}/edit', [CVController::class, 'edit']);

// Partner CV Edit Submit and Update
Route::put('/partner-view-cv/{cv_code}', [CVController::class, 'update']);

// Partner CV Registeration
Route::get('/new-cv-register', [CVController::class, 'create']);

// Partner New CV Storage
Route::post('/home', [CVController::class, 'store']);


//PARTNER JOB

// Partner Job Listing
Route::get('/apply-jobs',[JoblistingController::class, 'joblist']);

// Partner Show Job Info
Route::get('/job-info/{job_code}', [JoblistingController::class, 'viewjob']);


// PARTNER JOB APPLICATION

// Partner Job Application Page View
Route::get('/job-application/{job_code}', [ApplicationController::class, 'viewapplyjob']);

// Partner Job Application Add
Route::post('/job-application/{job_id}/add/{cv_id}', [ApplicationController::class, 'addCV'])
->name('job.addCV');

//Partner Job Application Remove
Route::delete('/job-application/{job_id}/remove/{cv_id}', [ApplicationController::class, 'removeCV'])
->name('job.removeCV');;

// Partner Applied List
Route::get('/partner-applied-list', [ApplicationController::class, 'appliedCV']);


///////////////////////////////////////////////////////////////////////////////////////////


//Admin Side

// ADMIN DASHBOARD

Route::get('/admin-home', [DashboardController::class, 'home']);

Route::get('/admin-home/date-filter', [DashboardController::class, 'dateFilter']);

Route::get('/chart/jobs-by-type', [DashboardController::class, 'jobsbytype']);

Route::get('/chart/cvs-by-nationality',[DashboardController::class, 'cvsbynationality']);

Route::get('/chart/partners-by-nationality', [DashboardController::class, 'partnersbynationality']);

Route::get('/graph/statistics', [DashboardController::class, 'statistics']);


// ADMIN JOBS

// Admin All Jobs
Route::get('/all-listed-jobs', [AdminJoblistingController::class, 'joblistAdmin']);

// Admin Show Job
Route::get('/all-listed-jobs/{job_code}', [AdminJoblistingController::class, 'viewjobAdmin']);

// Admin Job Edit
Route::get('/all-listed-jobs/{job_code}/edit', [AdminJoblistingController::class, 'edit']);

// Admin Job Edit and SUBMIT => UPDATE
Route::put('/all-listed-jobs/{job_code}', [AdminJoblistingController::class, 'update']);

// Admin Job Add New
Route::get('/add-new-job', [AdminJoblistingController::class, 'add']);

// Admin New Job Store
Route::post('/all-listed-jobs', [AdminJoblistingController::class, 'store']);


// ADMIN PARTNERS

// Admin All Partners Show
Route::get('/all-partners', [PartnerController::class, 'partner']);

// Admin Show Partner
Route::get('/all-partners/{partner_id}', [PartnerController::class, 'viewPartner']);

// Admin View Edit Partner
Route::get('/all-partners/{partner_id}/edit', [PartnerController::class, 'edit']);

// Admin Edit and Update Partner
Route::put('/all-partners/{partner_id}', [PartnerController::class, 'update']);

// Admin Add Partner
Route::get('/register-new-partner', [PartnerController::class, 'addNew']);

// Admin Store Partner
Route::post('/all-partners', [PartnerController::class, 'store']);


// ADMIN CV

// Admin all CV List
Route::get('/all-cv', [AdminCVController::class, 'allCV']);

// Admin Show CV
Route::get('/all-cv/{cv_code}', [AdminCVController::class, 'showCV']);

// Admin CV Completed
Route::get('/admin-completed', [AdminCVController::class, 'passedCV']);


// ADMIN CV/JOB APPLICATION

// Admin Application
Route::get('/admin-applications', [ApplicationController::class, 'AdminAppliedCV']);

// Admin Show CV Evaluate
Route::get('/admin-applications/{cv_code}/evaluate', [AdminCVController::class, 'seeEvaluate']);

// Admin EVALUATION UPDATE
Route::put('/admin-applications/{cv_code}/evaluate', [AdminCVController::class, 'evaluate']);


// CV/JOB PDF Download

Route::get('/cv/{cv_code}/pdf', [PDFController::class, 'cvPdf']);
Route::get('/job/{job_code}/pdf', [PDFController::class, 'jobPdf']);



