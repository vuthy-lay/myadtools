<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblPersonFamilyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_person_family', function (Blueprint $table) {
            $table->increments('seq');
            $table->string('per_code', 50)->collation('utf8_unicode_ci');
            $table->string('per_family_name', 50)->collation('utf8_unicode_ci');
            $table->string('per_family_status', 25)->nullable()->collation('utf8_unicode_ci');
            $table->string('per_family_dob', 50)->collation('utf8_unicode_ci');
            $table->string('per_family_job', 50)->nullable()->collation('utf8_unicode_ci');
            $table->string('per_family_org_name', 50)->nullable()->collation('utf8_unicode_ci');
            $table->string('per_family_job_orgname', 150)->nullable()->collation('utf8_unicode_ci');
            $table->string('per_family_type', 50)->nullable()->collation('utf8_unicode_ci');
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
        Schema::dropIfExists('tbl_person_family');
    }
}
