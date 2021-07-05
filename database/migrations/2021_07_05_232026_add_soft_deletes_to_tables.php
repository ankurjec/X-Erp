<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSoftDeletesToTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->softDeletes();
        });
        
        Schema::table('expenses', function (Blueprint $table) {
            $table->softDeletes();
        });
        
        Schema::table('loans', function (Blueprint $table) {
            $table->softDeletes();
        });
        
        Schema::table('loan_repayment', function (Blueprint $table) {
            $table->softDeletes();
        });
        
        Schema::table('orders', function (Blueprint $table) {
            $table->softDeletes();
        });
        
        Schema::table('payments', function (Blueprint $table) {
            $table->softDeletes();
        });
        
        Schema::table('payments_received', function (Blueprint $table) {
            $table->softDeletes();
        });
        
        Schema::table('projects', function (Blueprint $table) {
            $table->softDeletes();
        });
        
        Schema::table('users', function (Blueprint $table) {
            $table->softDeletes();
        });
        
        Schema::table('vendors', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /*Schema::table('tables', function (Blueprint $table) {
            //
        });*/
    }
}
