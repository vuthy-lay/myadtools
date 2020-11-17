<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblPersonKnowledgeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_person_knowledge', function (Blueprint $table) {
            $table->increments('seq');
            $table->string('per_code', 50)->collation('utf8_unicode_ci');
            $table->string('per_knowledge_level', 50)->collation('utf8_unicode_ci');
            $table->string('per_knowledge_school_name', 50)->collation('utf8_unicode_ci');
            $table->string('per_knowledge_school_place', 50)->collation('utf8_unicode_ci');
            $table->string('per_knowledge_certificate', 50)->nullable()->collation('utf8_unicode_ci');
            $table->string('per_knowledge_date_start', 50)->nullable()->collation('utf8_unicode_ci');
            $table->string('per_knowledge_date_finish', 50)->nullable()->collation('utf8_unicode_ci');
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
        Schema::dropIfExists('tbl_person_knowledge');
    }
}
