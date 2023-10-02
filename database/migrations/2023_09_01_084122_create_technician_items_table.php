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
        Schema::create('technician_items', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->bigInteger('log_id')->unsigned();
            $table->string('assigned_to');
            $table->string('request_type');
            $table->string('invoice_item_id')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('unit')->nullable();
            $table->string('note')->nullable();
            $table->string('file_path')->nullable();
            $table->timestamps();
            $table->string('created_by');
            $table->string('updated_by')->nullable();
            $table->foreign('log_id')->references('id')->on('service_logs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('technician_items');
    }
};
