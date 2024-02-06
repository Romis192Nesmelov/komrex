<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
//        Schema::create('events', function (Blueprint $table) {
//            $table->id();
//            $table->string('name');
//            $table->integer('date')->nullable();
//            $table->string('target_audience');
//            $table->string('course_objectives');
//            $table->text('description');
//            $table->string('duration',20);
//            $table->boolean('active');
//            $table->timestamps();
//        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
//        Schema::dropIfExists('events');
    }
};
