<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('token', 32);
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->unsignedBigInteger('outlet_id');
            $table->foreign('outlet_id')->references('id')->on('outlets')->onDelete('cascade');
            $table->integer('ext_user_id');
            $table->string('user_first_name');
            $table->string('user_last_name');
            $table->string('email')->nullable();
            $table->integer('ext_payment_id')->nullable();
            $table->string('ext_description')->nullable();
            $table->float('amount');
            $table->string('currency', 3);
            $table->unsignedBigInteger('gateway_id');
            $table->foreign('gateway_id')->references('id')->on('gateways')->onDelete('cascade');
            $table->string('gateway_order_id')->nullable();
            $table->text('gateway_message')->nullable();
            $table->string('gateway_status')->nullable();
            $table->string('signature');
            $table->string('ip')->nullable();
            $table->string('address')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('zip')->nullable();
            $table->string('success_url');
            $table->string('failed_url');
            $table->string('callback_url');
            $table->string('card_type')->nullable();
            $table->string('card_number', 16)->nullable();
            $table->string('card_month', 2)->nullable();
            $table->string('card_year', 4)->nullable();
            $table->string('card_cvv', 3)->nullable();
            $table->tinyInteger('status_update_attempts')->default(0);
            $table->string('status')->nullable();
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
        Schema::dropIfExists('transactions');
    }
}
