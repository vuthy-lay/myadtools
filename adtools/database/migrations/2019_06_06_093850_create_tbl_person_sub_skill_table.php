<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblPersonSubSkillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_person_sub_skill', function (Blueprint $table) {
            $table->increments('seq');
            $table->string('per_code', 50)->collation('utf8_unicode_ci');
            $table->string('per_sub_skill_name', 50)->collation('utf8_unicode_ci');
            $table->string('per_sub_skill_date', 50)->nullable()->collation('utf8_unicode_ci');
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
        Schema::dropIfExists('tbl_person_sub_skill');
    }
}
