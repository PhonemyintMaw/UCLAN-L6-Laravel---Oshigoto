<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('joblistings', function (Blueprint $table) {
            $table->id();
            $table->string('job_code')->unique();
            $table->string('job_type');
            $table->integer('recruit_number');
            $table->date('application_deadline');
            $table->string('company_name');
            $table->string('company_website');
            $table->string('company_location');
            $table->string('job_title');
            $table->text('job_description');
            $table->text('work_time');
            $table->string('off_days');
            $table->text('salary_benefits');
            $table->text('deductables');
            $table->text('after_deduction');
            $table->string('airticket_exp');
            $table->string('required_jp_level');
            $table->string('age_range');
            $table->string('job_gender');
            $table->string('job_nationality');
            $table->text('other_requirements') -> nullable();
            $table->string('job_availability')->default('Available');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('joblistings');
    }
};
