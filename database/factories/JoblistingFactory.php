<?php

namespace Database\Factories;

use App\Models\joblisting;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\joblisting>
 */
class JoblistingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    
    public function definition(): array
    {
        $job_type = $this->faker->randomElement([
            'RESTAURANT', 'NURSING', 'HOTEL', 
            'CONSTRUCTION', 'MECHANICAL PRODUCTION', 'FOOD PRODUCTION', 
            'DRIVING'
        ]);

        $required_jp_level = $this->faker->randomElement([
            'JLPT N4', 'JLPT N3', 'JLPT N2', 'JLPT N1'
        ]);

        $job_nationality = $this->faker->randomElement([
            'Myanmar', 'Philippines', 'Thailand', 
            'Vietnam', 'Indonesia', 'Cambodia', 
            'Laos'
        ]);

        $airticket_exp = $this->faker->randomElement([
            'COMPANY PAID', 'SELF PAID',
        ]);

        $job_gender = $this->faker->randomElement([
            'Male', 'Female', 'Both', 
        ]);

        $age_range = $this->faker->randomElement([
            '18~25', 'Under 30', 'Not limited', 
        ]);

        return [
            'job_type' => $job_type,
            'recruit_number' => $this->faker->numberBetween(0, 10),
            'application_deadline' => $this->faker
            ->dateTimeBetween('now', '+2 weeks')
            ->format('Y-m-d'),
            'company_name' => $this->faker->company(),
            'company_website' => $this->faker->url(),
            'company_location' => $this->faker->city(),
            'job_title' => $this->faker->sentence(),
            'job_description' => $this->faker->paragraph(5),
            'work_time' => $this->faker->sentence(),
            'off_days' => $this->faker->sentence(),
            'salary_benefits' => $this->faker->sentence(),
            'deductables' => $this->faker->sentence(),
            'after_deduction' => $this->faker->sentence(),
            'airticket_exp' => $airticket_exp,
            'required_jp_level' => $required_jp_level,
            'age_range' => $age_range,
            'job_gender' => $job_gender,
            'job_nationality' => $job_nationality,
            'other_requirements' => $this->faker->paragraph(5),
        ];
    }
}
