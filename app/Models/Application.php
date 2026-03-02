<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class application extends Model
{
    /** @use HasFactory<\Database\Factories\ApplicationFactory> */
    use HasFactory;

    protected $fillable = [
        'cv_id',
        'job_id',
    ];

    public function cv()
    {
        return $this->belongsTo(CVForms::class, 'cv_id');
    }

    public function job()
    {
        return $this->belongsTo(Joblisting::class, 'job_id');
    }

    public function scopeFilter($query, array $filters){ //For Filter Function

        if(!empty($filters['job_code'])){

            $query->where('job_code', 'like', '%' . $filters('job_code') . '%');
        
        }

        if(!empty($filters['company_name'])){

            $query->where('company_name', 'like', '%' . $filters('company_name') . '%');
        
        }

        if (!empty($filters['search'])) {

        $query->where(function ($q) use ($filters) {
            $q->Where('company_name', 'like', '%' . $filters['search'] . '%')
            -> orWhere('job_code', 'like', '%' . $filters['search'] . '%');
        });

        }
    }
}
