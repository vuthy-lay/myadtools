<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLetterOutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('letter_out', function (Blueprint $table) {
            $table->increments('seq');
            $table->string('letter_code', 50)->unique()->collation('utf8_unicode_ci');
            $table->string('letter_subject', 500)->collation('utf8_unicode_ci');
            $table->string('letter_priority', 50)->nullable()->collation('utf8_unicode_ci');
            $table->string('letter_char', 50)->nullable()->collation('utf8_unicode_ci');
            $table->date('letter_date')->nullable()->collation('utf8_unicode_ci');
            $table->string('letter_type', 50)->nullable()->collation('utf8_unicode_ci');
            $table->string('letter_distination', 150)->nullable()->collation('utf8_unicode_ci');
            $table->string('letter_discription', 300)->nullable()->collation('utf8_unicode_ci');
            $table->binary('letter_attachment')->nullable();
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
        Schema::dropIfExists('letter_out');
    }
}
