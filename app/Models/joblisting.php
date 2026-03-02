<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class joblisting extends Model
{
    /** @use HasFactory<\Database\Factories\JoblistingFactory> */
    use HasFactory;

    protected $fillable = [
        'job_type',
        'recruit_number',
        'application_deadline',
        'company_name',
        'company_website',
        'company_location',
        'job_title',
        'job_description',
        'work_time',
        'off_days',
        'salary_benefits',
        'deductables',
        'after_deduction',
        'airticket_exp',
        'required_jp_level',
        'age_range',
        'job_gender',
        'job_nationality',
        'other_requirements',
        'job_availability',
    ];

    protected static function booted()
    {
        static::creating(function ($job) {
            $prefix = strtoupper(substr($job -> job_type, 0, 3));
            $lastId = joblisting::max('id') + 1;
            $job->job_code = 'JOB - ' . 
            str_pad($lastId, 4, '0', STR_PAD_LEFT) . ' - ' . $prefix;
        });
    }

    //Filter Function
    public function scopeFilter($query, array $filters){
        if(!empty($filters['company_name'])){

            $query->where('company_name', 'like', '%' . $filters('company_name') . '%');
        
        }

        if(!empty($filters['job_type'])){

            $query->where('job_type', 'like', '%' . $filters('job_type') . '%');
        
        }

        if(!empty($filters['job_title'])){

            $query->where('job_title', 'like', '%' . $filters('job_title') . '%');
        
        }

        if(!empty($filters['required_jp_level'])){

            $query->where('required_jp_level', 'like', '%' . $filters('required_jp_level') . '%');
        
        }
        
        if(!empty($filters['job_nationality'])){

            $query->where('job_nationality', 'like', '%' . $filters('job_nationality') . '%');
        
        }

        if (!empty($filters['search'])) {

        $query->where(function ($q) use ($filters) {
            $q->Where('company_name', 'like', '%' . $filters['search'] . '%')
            -> orWhere('job_type', 'like', '%' . $filters['search'] . '%')
            -> orWhere('job_title', 'like', '%' . $filters['search'] . '%')
            -> orWhere('required_jp_level', 'like', '%' . $filters['search'] . '%')
            -> orWhere('job_nationality', 'like', '%' . $filters['search'] . '%');
        });

        }
    }

    //Filtering Partner Nationality with Job Nationality
    public function scopeforPartner($query, $partner){
        if($partner && $partner->partner_nationality)
            {
                return $query->where('job_nationality', $partner->partner_nationality);
            }

        return $query;
    }

    public function application()
    {
        return $this->hasMany(Application::class, 'job_id');
    }

    public function cvs()
    {
        return $this->belongsToMany(CVForms::class, 'applications', 'job_id', 'cv_id')
                    ->withTimestamps();
    }

    
}
