<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFileRefTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_ref', function (Blueprint $table) {
            $table->increments('seq');
            $table->string('letter_code', 50)->collation('utf8_unicode_ci');
            $table->string('attachment_name', 200)->nullable()->collation('utf8_unicode_ci');
            $table->binary('letter_attachment')->nullable();
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
        Schema::dropIfExists('file_ref');
    }
}
