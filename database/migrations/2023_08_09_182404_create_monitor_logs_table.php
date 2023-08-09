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
        Schema::create('monitor_logs', function (Blueprint $table) {
            $table->id();
            $table->uuid('monitor_id');
            $table->string('response');
            $table->string('response_type');
            $table->string('response_time');
            $table->string('response_status_code');
            $table->boolean('is_down');
            $table->timestamps();
            $table->index(['monitor_id', 'created_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monitor_logs');
    }
};
