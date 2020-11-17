<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLetterDetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('letter_det', function (Blueprint $table) {
            $table->increments('seq');
            $table->string('letter_code', 50)->collation('utf8_unicode_ci');
            $table->string('letter_subject', 500)->collation('utf8_unicode_ci');
            $table->string('letter_char', 50)->nullable()->collation('utf8_unicode_ci');
            $table->date('letter_date')->nullable()->collation('utf8_unicode_ci');
            $table->string('letter_type', 50)->nullable()->collation('utf8_unicode_ci');
            $table->string('letter_discription', 300)->nullable()->collation('utf8_unicode_ci');
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
        Schema::dropIfExists('letter_det');
    }
}
