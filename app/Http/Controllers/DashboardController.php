<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Gateway;
use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Вывод данных о количестве клиентов, шлюзов, транзакций
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $clients = Client::count('id');
        $gateways = Gateway::count('id');
        $transactions = Transaction::count('id');
        return view('dashboard.index', ['data' => [
            'clients'       => $clients,
            'gateways'      => $gateways,
            'transactions'  => $transactions,
            'route'         => $request->route()->getName(),
            'query'         => is_null($request->getQueryString()) ? '' : '?'. $request->getQueryString(),
        ]]);
    }
}
