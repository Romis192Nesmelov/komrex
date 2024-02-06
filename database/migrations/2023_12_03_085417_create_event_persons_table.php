<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \App\Models\Event;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
//        Schema::create('event_persons', function (Blueprint $table) {
//            $table->id();
//            $table->string('name');
//            $table->string('phone',16);
//            $table->foreignIdFor(Event::class)->constrained()->cascadeOnUpdate()->cascadeOnDelete();
//            $table->timestamps();
//        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
//        Schema::dropIfExists('event_persons');
    }
};
