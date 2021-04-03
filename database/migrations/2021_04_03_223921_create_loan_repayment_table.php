<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanRepaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_repayment', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('loan_id')->nullable();
            $table->decimal('amount',15,2)->nullable();
            $table->date('repayment_date')->nullable();
            $table->text('details')->nullable();
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
        Schema::dropIfExists('loan_repayment');
    }
}
