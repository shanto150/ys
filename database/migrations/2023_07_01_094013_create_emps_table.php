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
        Schema::create('emps', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('desig');
            $table->string('fathers_name')->nullable();
            $table->string('mothers_name')->nullable();
            $table->string('home_distrit')->nullable();
            $table->string('machine_id')->Unique()->nullable();
            $table->date('dob');
            $table->date('doj');
            $table->string('nid')->Unique()->nullable();
            $table->string('blood_group')->nullable();
            $table->string('religion')->nullable();
            $table->string('gender');
            $table->string('emp_type');
            $table->string('Mobile_personal');
            $table->string('Mobile_official');
            $table->integer('salary');
            $table->string('status');
            $table->string('present_address')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('image_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emps');
    }
};
