<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblStaffMedalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_staff_medal', function (Blueprint $table) {
            $table->increments('seq');
            $table->string('staff_code', 50)->collation('utf8_unicode_ci');
            $table->string('staff_medal_tittle', 150)->collation('utf8_unicode_ci');
            $table->string('staff_medal_date', 50)->nullable()->collation('utf8_unicode_ci');
            $table->string('staff_medal_para', 500)->nullable()->collation('utf8_unicode_ci');
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
        Schema::dropIfExists('tbl_staff_medal');
    }
}
