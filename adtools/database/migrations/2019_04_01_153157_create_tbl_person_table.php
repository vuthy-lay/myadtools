<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblPersonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_person', function (Blueprint $table) {
            $table->increments('seq');
            $table->string('per_code', 50)->unique()->collation('utf8_unicode_ci');
            $table->string('per_surname_kh', 50)->collation('utf8_unicode_ci');
            $table->string('per_name_kh', 50)->collation('utf8_unicode_ci');
            $table->string('per_surname_en', 50)->collation('utf8_unicode_ci');
            $table->string('per_name_en', 50)->collation('utf8_unicode_ci');
            $table->string('per_sex', 50)->collation('utf8_unicode_ci');
            $table->date('per_dob')->collation('utf8_unicode_ci');
            $table->string('per_nationality', 50)->collation('utf8_unicode_ci');
            $table->string('per_pob', 200)->collation('utf8_unicode_ci');
            $table->string('per_current_address', 200)->collation('utf8_unicode_ci');
            $table->string('per_phone_number', 50)->collation('utf8_unicode_ci');
            $table->string('per_email', 50)->nullable()->collation('utf8_unicode_ci');
            $table->binary('per_photo')->nullable();
            $table->string('per_language', 150)->nullable()->collation('utf8_unicode_ci');
            $table->string('per_father_name', 50)->collation('utf8_unicode_ci');
            $table->string('per_father_status', 25)->nullable()->collation('utf8_unicode_ci');
            $table->date('per_father_dob')->collation('utf8_unicode_ci');
            $table->string('per_father_job', 50)->nullable()->collation('utf8_unicode_ci');
            $table->string('per_father_job_orgname', 150)->nullable()->collation('utf8_unicode_ci');
            $table->string('per_mother_name', 50)->collation('utf8_unicode_ci');
            $table->string('per_mother_status', 25)->nullable()->collation('utf8_unicode_ci');
            $table->date('per_mother_dob')->collation('utf8_unicode_ci');
            $table->string('per_mother_job', 50)->nullable()->collation('utf8_unicode_ci');
            $table->string('per_mother_job_orgname', 150)->nullable()->collation('utf8_unicode_ci');
            $table->string('per_children_number', 50)->nullable()->collation('utf8_unicode_ci');
            $table->string('per_sibling_member', 50)->collation('utf8_unicode_ci');
            $table->string('per_sibling_female', 50)->nullable()->collation('utf8_unicode_ci');
            $table->string('per_sibling_male', 50)->nullable()->collation('utf8_unicode_ci');
            $table->string('per_sibling_rank', 50)->collation('utf8_unicode_ci');
            $table->string('record_stat', 50)->nullable()->collation('utf8_unicode_ci');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_person');
    }
}
