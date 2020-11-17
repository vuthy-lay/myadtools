<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblstaffRefTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_staff_ref', function (Blueprint $table) {
            $table->increments('seq');
            $table->string('staff_code', 50)->collation('utf8_unicode_ci');
            $table->string('file_name', 200)->nullable()->collation('utf8_unicode_ci');
            $table->binary('file_ref')->nullable();
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
        Schema::dropIfExists('tbl_staff_ref');
    }
}
