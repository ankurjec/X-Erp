<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->decimal('total_order_value',15,2)->nullable();
        });
        Schema::table('payments', function (Blueprint $table) {
            $table->unsignedInteger('final_beneficiary_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('total_order_value');
        });
        
        Schema::table('payments', function (Blueprint $table) {
            $table->dropColumn('final_beneficiary_id');
        });
    }
}
