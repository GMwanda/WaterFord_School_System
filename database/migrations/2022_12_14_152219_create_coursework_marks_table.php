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
        Schema::create('coursework_marks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stdId')->constrained('Users');
            $table->string('Marks')->default(0);
            $table->string('Assessment');
            $table->foreignId('courseId')->constrained('courses');
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
        Schema::dropIfExists('coursework_marks');
    }
};
