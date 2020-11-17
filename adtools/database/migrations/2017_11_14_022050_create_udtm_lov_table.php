<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUdtmLovTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('udtm_lov', function (Blueprint $table) {
            $table->increments('seq');
            $table->string('lov_type', 50)->collation('utf8_unicode_ci');
            $table->string('lov_code', 50)->collation('utf8_unicode_ci');
            $table->string('lov_desc', 150)->nullable()->collation('utf8_unicode_ci');
            $table->string('lov_desc_kh', 150)->nullable()->collation('utf8_unicode_ci');
            $table->string('lov_text', 500)->nullable()->collation('utf8_unicode_ci');
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
        Schema::dropIfExists('udtm_lov');
    }
}
