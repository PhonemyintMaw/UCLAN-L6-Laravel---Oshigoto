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
        Schema::create('c_v_forms', function (Blueprint $table) {
            $table->id();
            $table->string('cv_code')->unique();
            $table->string('cv_profile')->nullable();//File
            $table->foreignId('partner_id')->nullable()->constrained('partners')
            ->onDelete('cascade');
            
            $table->string('cv_name');
            $table->string('cv_gender');
            $table->integer('cv_age');
            $table->date('cv_dob');
            $table->string('cv_nationality');
            $table->string('cv_address');
            $table->string('cv_religion');
            $table->string('cv_marriage');
            $table->string('cv_job_type');

            $table->string('cv_job_certificate')->nullable();//File

            $table->string('cv_jp_level');

            $table->string('cv_jp_certificate')->nullable();//File
            
            $table->integer('cv_jp_study_year');
            $table->integer('cv_jp_study_month');
            $table->string('cv_desired_work_length');

            //SCHOOL HISTORY
            $table->string('cv_schoolhistory1_name');
            $table->string('cv_schoolhistory1_subject');
            $table->date('cv_schoolhistory1_start');
            $table->date('cv_schoolhistory1_end');
            $table->string('cv_schoolhistory1_status');

            $table->string('cv_schoolhistory2_name')->nullable();
            $table->string('cv_schoolhistory2_subject')->nullable();
            $table->date('cv_schoolhistory2_start')->nullable();
            $table->date('cv_schoolhistory2_end')->nullable();
            $table->string('cv_schoolhistory2_status')->nullable();

            $table->string('cv_schoolhistory3_name')->nullable();
            $table->string('cv_schoolhistory3_subject')->nullable();
            $table->date('cv_schoolhistory3_start')->nullable();
            $table->date('cv_schoolhistory3_end')->nullable();
            $table->string('cv_schoolhistory3_status')->nullable();

            //JOB HISTORY
            $table->string('cv_jobhistory1_name')->nullable();
            $table->string('cv_jobhistory1_position')->nullable();
            $table->date('cv_jobhistory1_start')->nullable();
            $table->date('cv_jobhistory1_end')->nullable();
            $table->string('cv_jobhistory1_status')->nullable();

            $table->string('cv_jobhistory2_name')->nullable();
            $table->string('cv_jobhistory2_position')->nullable();
            $table->date('cv_jobhistory2_start')->nullable();
            $table->date('cv_jobhistory2_end')->nullable();
            $table->string('cv_jobhistory2_status')->nullable();

            $table->string('cv_jobhistory3_name')->nullable();
            $table->string('cv_jobhistory3_position')->nullable();
            $table->date('cv_jobhistory3_start')->nullable();
            $table->date('cv_jobhistory3_end')->nullable();
            $table->string('cv_jobhistory3_status')->nullable();

            //OTHERS
            $table->string('cv_email')->nullable();
            $table->string('cv_phone')->nullable();

            
            $table->string('cv_passport_number')->nullable();
            $table->date('cv_passport_date')->nullable();

            $table->string('cv_passport')->nullable();//File

            $table->integer('cv_jp_visit_time')->nullable();
            $table->integer('cv_COE_Received')->nullable();
            $table->integer('cv_COE_Rejected')->nullable();

            $table->string('cv_status')->default('Not Applied'); //For Admins Only
            $table->text('cv_evaluation')->nullable(); //For Admins Only

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('c_v_forms');
    }
};
