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
        Schema::create('seat_allocations', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('trip_id');
            $table->foreign('trip_id')->references('id')->on('trips')->cascadeOnUpdate()->cascadeOnDelete();

            $table->unsignedBigInteger('coach_id');
            $table->foreign('coach_id')->references('id')->on('coaches')->cascadeOnUpdate()->cascadeOnDelete();

            $table->integer('number_of_ticket');

            $table->datetime('journey_date');
            
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seat_allocations');
    }
};
