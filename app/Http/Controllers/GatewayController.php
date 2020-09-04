<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\Gateway;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class GatewayController extends Controller
{
    /**
     * Вывод данных доступных шлюзов
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $gateways = Gateway::all();
        return view('gateways.index', ['data' => [
            'gateways'  => $gateways,
            'route' => $request->route()->getName(),
            'query' => is_null($request->getQueryString()) ? '' : '?'. $request->getQueryString(),
        ]]);
    }

    /**
     * Вывод формы добавления шлюза
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAddForm(Request $request)
    {
        $currency = Currency::all();
        $payment_methods = PaymentMethod::all();
        return view('gateways.show_add_form', ['data' => [
            'payment_methods' => $payment_methods,
            'currency'  => $currency,
            'route' => $request->route()->getName(),
            'query' => is_null($request->getQueryString()) ? '' : '?'. $request->getQueryString(),
        ]]);
    }

    /**
     * Вывод формы редактирования шлюза
     * @param Request $request
     * @param $gateway_id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showEditForm(Request $request, $gateway_id)
    {
        $gateway = Gateway::where('id', $gateway_id)->first();
        $currency = Currency::all();
        $payment_methods = PaymentMethod::all();
        return view('gateways.show_edit_form', ['data' => [
            'gateway'   => $gateway,
            'payment_methods' => $payment_methods,
            'currency'  => $currency,
            'route' => $request->route()->getName(),
            'query' => is_null($request->getQueryString()) ? '' : '?'. $request->getQueryString(),
        ]]);
    }

    /**
     * Создание шлюза
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add(Request $request)
    {
        $gateway = new Gateway;
        foreach($request->all() as $key=>$value) {
            if($key == '_token'){
                continue;
            }
            if($key == 'transaction_cost'){
                $value = str_replace(',', '.', $value);
            }
            $gateway->$key = $value;
        }
        $gateway->save();

        return redirect()->route('payment_system_admin:gateways.index');

    }

    /**
     * Редактирование шлюза
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit(Request $request)
    {
        $gateway = $gateway = Gateway::where('id', $request->gateway_id)->first();
        foreach($request->all() as $key=>$value) {
            if($key == '_token' || $key == 'gateway_id'){
                continue;
            }
            if($key == 'transaction_cost'){
                $value = str_replace(',', '.', $value);
            }
            $gateway->$key = $value;
        }
        $gateway->save();

        return redirect()->route('payment_system_admin:gateways.index');
    }

    /**
     * Удаление шлюза
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Request $request)
    {
        Gateway::where('id', $request->gateway_id)->delete();
        return redirect()->route('payment_system_admin:gateways.index');
    }


}
