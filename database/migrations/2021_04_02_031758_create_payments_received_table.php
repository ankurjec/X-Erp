<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsReceivedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments_received', function (Blueprint $table) {
            $table->id();
            $table->string('from');
            $table->unsignedInteger('customer_id')->nullable();
            $table->date('received_date')->nullable();
            $table->string('mode')->nullable();
            $table->decimal('amount',15,2)->nullable();
            $table->decimal('cgst_amount',15,2)->nullable();
            $table->decimal('sgst_amount',15,2)->nullable();
            $table->decimal('igst_amount',15,2)->nullable();
            $table->text('details')->nullable();
            $table->string('reference_no')->nullable();
            $table->string('invoice_no')->nullable();
            $table->string('gst_no')->nullable();
            $table->integer('place_of_supply')->nullable();
            $table->string('full_partial_advance')->nullable();
            $table->unsignedInteger('project_id');
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
        Schema::dropIfExists('payments_received');
    }
}
