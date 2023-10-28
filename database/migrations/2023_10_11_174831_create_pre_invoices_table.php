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
        Schema::create('pre_invoices', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->bigInteger('log_id')->unsigned();
            $table->date('invoice_month');
            $table->string('invoice_item_id');
            $table->integer('quantity');
            $table->string('unit');
            $table->string('total_amount');
            $table->decimal('rate', 11, 2);
            $table->string('note')->nullable();
            $table->timestamps();
            $table->string('created_by');
            $table->string('visi_id');
            $table->string('updated_by')->nullable();
            $table->integer('sl');
            $table->unique(['log_id', 'invoice_month','invoice_item_id']);
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
        Schema::dropIfExists('pre_invoices');
    }
};
