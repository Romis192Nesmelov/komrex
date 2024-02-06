<?php

use App\Models\Technic;
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
//        Schema::create('constructive_features', function (Blueprint $table) {
//            $table->id();
//            $table->string('image')->nullable();
//            $table->string('head');
//            $table->text('text');
//            $table->foreignIdFor(Technic::class)->constrained()->cascadeOnUpdate()->cascadeOnDelete();
//            $table->boolean('active');
//            $table->timestamps();
//        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
//        Schema::dropIfExists('constructive_features');
    }
};
