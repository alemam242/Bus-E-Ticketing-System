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
        Schema::create('trips', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('coach_id');
            $table->foreign('coach_id')->references('id')->on('coaches')->cascadeOnUpdate()->cascadeOnDelete();

            $table->unsignedBigInteger('departure_location_id');
            $table->foreign('departure_location_id')->references('id')->on('locations')->cascadeOnUpdate()->cascadeOnDelete();

            $table->unsignedBigInteger('arrival_location_id');
            $table->foreign('arrival_location_id')->references('id')->on('locations')->cascadeOnUpdate()->cascadeOnDelete();

            $table->datetime('departure_time');
            $table->datetime('arrival_time');

            $table->decimal('fare');
            
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trips');
    }
};
