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
        Schema::create('monitors', function (Blueprint $table) {
            $table->uuid();
            $table->string('name');
            $table->string('description');
            $table->integer('monitor_type');
            $table->integer('interval');
            $table->integer('retries');
            $table->string('monitor_url')->nullable();
            $table->string('monitor_method')->nullable();
            $table->boolean('monitor_authentication')->nullable();
            $table->string('monitor_username')->nullable();
            $table->string('monitor_password')->nullable();
            $table->string('monitor_headers')->nullable();
            $table->string('monitor_body')->nullable();
            $table->string('monitor_body_type')->nullable();
            $table->string('expected_response')->nullable();
            $table->string('expected_response_type')->nullable();
            $table->string('expected_response_time')->nullable();
            $table->string('expected_status_code')->nullable();
            $table->timestamp('last_triggered_at')->nullable();
            $table->timestamp('last_down_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monitors');
    }
};
