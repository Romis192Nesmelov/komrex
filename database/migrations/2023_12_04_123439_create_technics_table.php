<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\TechnicType;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('technics', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('weight');
            $table->double('power', 4, 1);
            $table->string('engine_model')->nullable();
            $table->smallInteger('load_capacity')->nullable();
            $table->smallInteger('traction_force')->nullable();
            $table->smallInteger('drum_static_pressure')->nullable();
            $table->boolean('komrex')->nullable();
            $table->text('characteristics')->nullable();
            $table->text('description')->nullable();
            $table->boolean('active');
            $table->foreignIdFor(TechnicType::class)->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('technics');
    }
};
