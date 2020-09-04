<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGatewaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gateways', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('currency', 5);
            $table->tinyInteger('rolling')->nullable();
            $table->tinyInteger('transaction_percent')->nullable();
            $table->decimal('transaction_cost', 3, 1)->nullable();
            $table->tinyInteger('refund')->nullable();
            $table->integer('chargeback')->nullable();
            $table->tinyInteger('hold')->nullable();
            $table->integer('min_payout')->nullable();
            $table->string('payment_methods')->nullable();
            $table->integer('payout_cost')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gateways');
    }
}
