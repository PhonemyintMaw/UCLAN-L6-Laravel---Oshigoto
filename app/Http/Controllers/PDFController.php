<?php

namespace App\Http\Controllers;

use App\Models\CVForms;
use App\Models\joblisting;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    //Generate CV PDF
    public function cvPdf($cv_code){
        $cv = CVForms::where('cv_code', $cv_code)->firstOrFail();
        $pdf = Pdf::setPaper('A4', 'portrait')
        ->loadView('view-as-pdf.cv', compact('cv'));

        return $pdf->stream("CV-{$cv->cv_code}.pdf");

    }

    //Generate JOB PDF
    public function jobPdf($job_code){
        $job = joblisting::where('job_code', $job_code)->firstOrFail();
        $pdf = Pdf::setPaper('A4', 'portrait')
        ->loadView('view-as-pdf.joblisting', compact('job'));

        return $pdf->stream("Job-{$job->job_code}.pdf");

    }

}
