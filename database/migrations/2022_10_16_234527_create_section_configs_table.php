<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('section_configs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('section_id')->constrained('sections');
            $table->longText('time')->nullable();
            $table->longText('available_for')->nullable();
            $table->longText('available_when')->nullable();
            $table->longText('show_answers')->nullable();
            $table->longText('show_questions')->nullable();
            $table->longText('language')->nullable();
            $table->longText('numbers_of_questions')->nullable();
            $table->longText('alpha_type')->nullable();
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
        Schema::dropIfExists('exam_configs');
    }
};
