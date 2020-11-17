<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblPersonWorkhistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_person_workhistory', function (Blueprint $table) {
            $table->increments('seq');
            $table->string('per_code', 50)->collation('utf8_unicode_ci');
            $table->string('per_workhis_date_stat', 50)->collation('utf8_unicode_ci');
            $table->string('per_workhis_date_finish', 50)->collation('utf8_unicode_ci');
            $table->string('per_workhis_org_name', 50)->collation('utf8_unicode_ci');
            $table->string('per_workhis_dpt_name', 50)->nullable()->collation('utf8_unicode_ci');
            $table->string('per_workhis_sub_dpt_name', 50)->nullable()->collation('utf8_unicode_ci');
            $table->string('per_workhis_title_name', 50)->nullable()->collation('utf8_unicode_ci');
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
        Schema::dropIfExists('tbl_person_workhistory');
    }
}
