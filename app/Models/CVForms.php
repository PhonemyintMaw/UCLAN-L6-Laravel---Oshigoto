<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CVForms extends Model
{
    /** @use HasFactory<\Database\Factories\CVFormsFactory> */
    use HasFactory;

    protected $fillable = [
    
            'cv_code',
            'partner_id',
            'cv_profile',
            'cv_name',
            'cv_gender',
            'cv_age',
            'cv_dob',
            'cv_nationality',
            'cv_address', 
            'cv_religion',
            'cv_marriage',
            'cv_job_type',
            'cv_job_certificate',
            'cv_jp_level',
            'cv_jp_certificate',
            'cv_jp_study_year',
            'cv_jp_study_month',
            'cv_desired_work_length',
            'cv_schoolhistory1_name',
            'cv_schoolhistory1_subject',
            'cv_schoolhistory1_start',
            'cv_schoolhistory1_end',
            'cv_schoolhistory1_status', 
            'cv_schoolhistory2_name',
            'cv_schoolhistory2_subject',
            'cv_schoolhistory2_start',
            'cv_schoolhistory2_end',
            'cv_schoolhistory2_status', 
            'cv_schoolhistory3_name',
            'cv_schoolhistory3_subject',
            'cv_schoolhistory3_start',
            'cv_schoolhistory3_end',
            'cv_schoolhistory3_status',

            //JOB HISTORY
            'cv_jobhistory1_name',
            'cv_jobhistory1_position',
            'cv_jobhistory1_start',
            'cv_jobhistory1_end',
            'cv_jobhistory1_status', 
            'cv_jobhistory2_name',
            'cv_jobhistory2_position',
            'cv_jobhistory2_start',
            'cv_jobhistory2_end',
            'cv_jobhistory2_status', 
            'cv_jobhistory3_name',
            'cv_jobhistory3_position',
            'cv_jobhistory3_start',
            'cv_jobhistory3_end',
            'cv_jobhistory3_status',

            //OTHERS
            'cv_email',
            'cv_phone',
        
            'cv_passport_number',
            'cv_passport_date',
            'cv_passport',
            'cv_jp_visit_time',
            'cv_COE_Received',
            'cv_COE_Rejected',
            'cv_status',
            'cv_evaluation',
            
    ];

    public function partner()
    {
        return $this->belongsTo(Partner::class, 'partner_id');
    }

    public function application()
    {
    return $this->hasMany(Application::class, 'cv_id');
    }

    public function job()
    {
        return $this->belongsToMany(JobListing::class, 'applications', 'cv_id', 'job_id')
                    ->withTimestamps();
    }

    //For Filter Function
    public function scopeFilter($query, array $filters){ 

        if(!empty($filters['cv_name'])){

            $query->where('cv_name', 'like', '%' . $filters('cv_name') . '%');
        
        }

        if(!empty($filters['cv_jp_level'])){

            $query->where('cv_jp_level', 'like', '%' . $filters('cv_jp_level') . '%');
        
        }

        if(!empty($filters['cv_job_type'])){

            $query->where('cv_job_type', 'like', '%' . $filters('cv_job_type') . '%');
        
        }

        if(!empty($filters['cv_nationality'])){

            $query->where('cv_nationality', 'like', '%' . $filters('cv_nationality') . '%');
        
        }
        
        if(!empty($filters['cv_status'])){

            $query->where('cv_status', 'like', '%' . $filters('cv_status') . '%');
        
        }

        if (!empty($filters['search'])) {

        $query->where(function ($q) use ($filters) {
            $q->Where('cv_name', 'like', '%' . $filters['search'] . '%')
            -> orWhere('cv_jp_level', 'like', '%' . $filters['search'] . '%')
            -> orWhere('cv_job_type', 'like', '%' . $filters['search'] . '%')
            -> orWhere('cv_nationality', 'like', '%' . $filters['search'] . '%')
            -> orWhere('cv_status', 'like', '%' . $filters['search'] . '%');
        });

        }
    }

    protected static function booted(){
        
        parent::boot();
        
        static::creating(function ($cvForm) {
            
            $nextId = self::max('id') + 1;
            $cvForm->cv_code = 'CV-' . str_pad($nextId, 4, '0', STR_PAD_LEFT);
        });
    }

}
