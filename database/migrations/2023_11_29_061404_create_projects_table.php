<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\ProjectType;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
//        Schema::create('projects', function (Blueprint $table) {
//            $table->id();
//            $table->string('head');
//            $table->integer('date')->nullable();
//            $table->text('text');
//            $table->string('pdf')->nullable();
//            $table->foreignIdFor(ProjectType::class)->constrained()->cascadeOnUpdate()->cascadeOnDelete();
//            $table->boolean('active');
//            $table->timestamps();
//        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
//        Schema::dropIfExists('projects');
    }
};
