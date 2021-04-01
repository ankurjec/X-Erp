<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
            $table->string('entity_type')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('vendor_id')->nullable();
            $table->unsignedInteger('customer_id')->nullable();
            $table->unsignedInteger('employee_id')->nullable();
            $table->decimal('amount',15,2)->nullable();
            $table->text('details')->nullable();
            $table->text('uploads')->nullable();
            $table->unsignedInteger('project_id');
            $table->unsignedInteger('createdby_user_id')->nullable();
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
        Schema::dropIfExists('expenses');
    }
}
