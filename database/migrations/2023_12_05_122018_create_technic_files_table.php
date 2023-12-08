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
        Schema::create('technic_files', function (Blueprint $table) {
            $table->id();
            $table->string('pdf',50)->nullable();
            $table->string('name');
            $table->foreignIdFor(Technic::class)->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->boolean('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('technic_files');
    }
};
