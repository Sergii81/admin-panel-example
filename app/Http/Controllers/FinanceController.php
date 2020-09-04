<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\Payout;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class FinanceController extends Controller
{
    /**
     * Вывод завершенных выплат
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function payouts(Request $request)
    {
        $payouts = Payout::where('status', 'completed')->get();
        return view('finance.payouts', ['data' => [
            'payouts'   => $payouts,
            'route' => $request->route()->getName(),
            'query' => is_null($request->getQueryString()) ? '' : '?'. $request->getQueryString(),
        ]]);
    }

    /**
     * Вывод запросов на выплату
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function payoutRequests(Request $request)
    {
        $payout_requests = Payout::where('status', 'created')->get();
        foreach ($payout_requests as $payout_request) {
            $payout_request->available_for_payout = Balance::where('client_id', $payout_request->client_id)
                                                    ->where('gateway_id', $payout_request->gateway_id)
                                                    ->select(DB::raw('available_for_payout - payout_amount as available_for_payout'))
                                                    ->first();

        }
        return view('finance.payout_requests', ['data' => [
            'payout_requests'   => $payout_requests,
            'route' => $request->route()->getName(),
            'query' => is_null($request->getQueryString()) ? '' : '?'. $request->getQueryString(),
        ]]);
    }

    /**
     * Метод одобрения выплаты, корректировка баланса на сумму выплаты
     * @param Request $request
     * @param $payout_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function payoutRequestsProcess(Request $request, $payout_id)
    {
        $payout = Payout::where('id', $payout_id)->first();
        //
        // у шлюза Необанк нет методов апи для возврата, возврат делается в кабинете Необанка.
        //
        $balance = Balance::where('client_id', $payout->client_id)
                            ->where('gateway_id', $payout->gateway_id)
                            ->first();
        $balance->available_for_payout -= $payout->amount;
        $balance->payout_amount -= $payout->amount;
        $balance->save();
        $payout->status = 'completed';
        $payout->save();

        return redirect()->route('payment_system_admin:finance.payouts');
    }

    /**
     * Вывод баланса клиентов
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function balance(Request $request)
    {
        $balances = Balance::all();
        return view('finance.balance', ['data' => [
            'balances'  => $balances,
            'route'     => $request->route()->getName(),
            'query'     => is_null($request->getQueryString()) ? '' : '?'. $request->getQueryString(),
        ]]);
    }
}
