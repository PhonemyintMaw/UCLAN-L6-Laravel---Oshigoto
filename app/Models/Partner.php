<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Partner extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\PartnerFactory> */
    use HasFactory, Notifiable;

    protected $table = 'partners';

    protected $fillable = [
        'partner_name',
        'email', 
        'partner_address', 
        'partner_nationality',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function cvs()
    {
        return $this->hasMany(CVForms::class, 'partner_id');
    }


    protected static function booted()
    {
        static::creating(function ($partner) {
            
             // MM for Myanmar, PH for Philippines
            $prefix = strtoupper(substr($partner -> partner_nationality, 0, 2));
            $lastId = partner::max('id') + 1;
            $partner->partner_id = 'PT' . $prefix . '-' . str_pad($lastId, 3, '0', STR_PAD_LEFT);
        });
    }

    public function scopeFilter($query, array $filters){

        if(!empty($filters['partner_name'])){

            $query->where('partner_name', 'like', '%' . $filters['partner_name'] . '%');
        
        }

       if(!empty($filters['partner_nationality'])){

            $query->where('partner_nationality', 'like', '%' . $filters['partner_nationality'] . '%');
        
        }

        if (!empty($filters['search'])) {

        $query->where(function ($q) use ($filters) {
            $q->Where('partner_nationality', 'like', '%' . $filters['search'] . '%')
            -> orWhere('partner_name', 'like', '%' . $filters['search'] . '%');
        });

        }
    }

}
