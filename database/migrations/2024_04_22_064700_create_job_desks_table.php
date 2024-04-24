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
        Schema::create('job_desks', function (Blueprint $table) {
            $table->id();
            $table->string('jobdesk');
            $table->string('description');
            $table->integer('salary');
            $table->timestamps();
        });

        Schema::table('karyawans', function (Blueprint $table) {
            $table->foreign('job_desks_id')->references('id')->on('job_desks');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_desks');
    }
};
