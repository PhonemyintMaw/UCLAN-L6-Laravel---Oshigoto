<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\joblisting;
use App\Models\CVForms;
use Illuminate\Support\Facades\Hash;
use App\Models\partner;
use Database\Factories\CVFormsFactory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'Phone Myint Maw',
            'email' => 'admin@oshigoto.com',
            'password' => 'pmm552002'
        ]);


        joblisting::factory(15)->create();
        
        $partners = [
            [
            'partner_name' => 'Toshin',
            'email' => 'mmtoshin@gmail.com',
            'partner_address' => 'Toshin Language School',
            'partner_nationality' => 'Myanmar',
            'password' => Hash::make('toshin2025'),
            ],
            [
            'partner_name' => 'Hikari',
            'email' => 'Hikari@gmail.com',
            'partner_address' => 'Hikari Language School',
            'partner_nationality' => 'Indonesia',
            'password' => Hash::make('hikari2025'),
            ],
            [
            'partner_name' => 'Nihongo',
            'email' => 'nihongo@gmail.com',
            'partner_address' => 'Nihongo Language School',
            'partner_nationality' => 'Laos',
            'password' => Hash::make('nihon2025'),
            ],
        ];
        
        foreach($partners as $partnerData){
            
            Partner::create($partnerData);
            
        }
    }
}
