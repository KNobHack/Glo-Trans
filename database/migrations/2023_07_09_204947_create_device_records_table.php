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
        Schema::create('device_records', function (Blueprint $table) {
            $table->id();

            $table->float('gyro_x');
            $table->float('gyro_y');
            $table->float('gyro_z');

            $table->float('accl_x');
            $table->float('accl_y');
            $table->float('accl_z');

            $table->string('text');
            $table->string('audio_file');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('device_records');
    }
};
