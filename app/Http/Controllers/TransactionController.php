<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Вывод транзакций
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $transactions = Transaction::all();

        return view('transactions.index', ['data' => [
            'transactions' => $transactions,
            'route' => $request->route()->getName(),
            'query' => is_null($request->getQueryString()) ? '' : '?'. $request->getQueryString(),
        ]]);
    }

    /**
     * Вывод подробной информации о транзакции
     * @param Request $request
     * @param $transaction_id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showDetails(Request $request, $transaction_id)
    {
        $transaction = Transaction::where('id', $transaction_id)->first();

        return view('transactions.show_details', ['data' => [
            'transaction' => $transaction,
            'route' => $request->route()->getName(),
            'query' => is_null($request->getQueryString()) ? '' : '?'. $request->getQueryString(),
        ]]);
    }
}
