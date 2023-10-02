<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_logs', function (Blueprint $table) {
            $table->id();
            $table->integer('outlet_code');
            $table->integer('visi_id');
            $table->integer('visi_size');
            $table->string('outlet_name');
            $table->string('outlet_address')->nullable();
            $table->string('outlet_mobile')->nullable();
            $table->string('person_mobile')->nullable();
            $table->string('complain_by')->nullable();
            $table->string('complains')->nullable();
            $table->string('se_area')->nullable();
            $table->string('asm_area')->nullable();
            $table->string('region')->nullable();
            $table->string('db_name')->nullable();
            $table->string('vendor')->nullable();
            $table->date('log_date');
            $table->date('assigned_date')->nullable();
            $table->date('first_response_date')->nullable();
            $table->date('close_date')->nullable();
            $table->tinytext('status')->comment('Start,Hold,Pending,Working,Close');
            $table->string('job_description')->nullable();
            $table->string('failure_analysis')->nullable();
            $table->string('pending_reason')->nullable();
            $table->string('pulled_delivered')->nullable();
            $table->string('required_day')->nullable();
            $table->string('remarkes')->nullable();
            $table->timestamps();
            $table->index(['log_date', 'outlet_code', 'visi_size', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_logs');
    }
};
