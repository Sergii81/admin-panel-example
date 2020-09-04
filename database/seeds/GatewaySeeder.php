<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GatewaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gateways')->insert([
            [
                'id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'name' => 'platio',
                'currency' => 'RUB',
                'rolling'   => 0,
                'transaction_percent'   => 6,
                'transaction_cost'  => 0,
                'refund'    => 0,
                'chargeback'    => 4000,
                'hold'  => 14,
                'min_payout'    => 0,
                'payment_methods'   => 'Russian VISA',
                'our_percent'   => 5,
            ],
            [
                'id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'name' => 'neobanq',
                'currency' => 'EUR',
                'rolling'   => 10,
                'transaction_percent'   => 8,
                'transaction_cost'  => 0.5,
                'refund'    => 10,
                'chargeback'    => 45,
                'hold'  => 14,
                'min_payout'    => 2000,
                'payment_methods'   => 'Bank Transfer',
                'our_percent'   => 7,
            ],
        ]);
    }
}
