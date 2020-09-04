<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBalancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->unsignedBigInteger('gateway_id');
            $table->foreign('gateway_id')->references('id')->on('gateways')->onDelete('cascade');
            $table->integer('sum')->nullable();
            $table->string('currency', 3);
            $table->integer('rolling_reserve')->nullable();
            $table->integer('rolling_reserve_to_payout')->nullable();
            $table->integer('available_for_payout')->nullable();
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
        Schema::dropIfExists('balances');
    }
}
