<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Gateway;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    /**
     * Вывод данных клиентов
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $clients = Client::all();

        return view('clients.index', ['data' => [
            'clients'   => $clients,
            'route'     => $request->route()->getName(),
            'query'     => is_null($request->getQueryString()) ? '' : '?'. $request->getQueryString(),
        ]]);
    }

    /**
     * Вывод формы добавления клиента
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAddForm(Request $request)
    {
        $gateways = Gateway::all();
        return view('clients.show_add_form', ['data' => [
            'gateways'  => $gateways,
            'route'     => $request->route()->getName(),
            'query'     => is_null($request->getQueryString()) ? '' : '?'. $request->getQueryString(),
        ]]);
    }

    /**
     * Метод добавления клиента
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add(Request $request)
    {
        $client = new Client;
        $client->name = $request->name;
        $client->email = $request->email;
        $client->password = Hash::make($request->password);
        if(!empty($request->gateway_1)) {
            $client->gateway_1 = $request->gateway_id_1;
        }
        if(!empty($request->gateway_2)) {
            $client->gateway_2 = $request->gateway_id_2;
        }
        $client->save();
        return redirect()->route('payment_system_admin:clients.index');
    }

    /**
     * Вывод формы редактирования клиента
     * @param Request $request
     * @param $client_id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showEditForm(Request $request, $client_id)
    {
        $client = Client::where('id', $client_id)->first();
        $gateways = Gateway::all();
        return view('clients.show_edit_form', ['data' => [
            'client'    => $client,
            'gateways'  => $gateways,
            'route'     => $request->route()->getName(),
            'query'     => is_null($request->getQueryString()) ? '' : '?'. $request->getQueryString(),
        ]]);
    }

    /**
     * Редактирование клиента
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit(Request $request)
    {

        $client = Client::where('id', $request->client_id)->first();

        $client->name = $request->name;
        $client->email = $request->email;
        if(!empty($request->password)) {
            $client->password = Hash::make($request->password);
        }
        if(!empty($request->gateway_1)) {
            $client->gateway_1 = $request->gateway_id_1;
        } else {
            $client->gateway_1 = null;
        }

        if(!empty($request->gateway_2)) {
            $client->gateway_2 = $request->gateway_id_2;
        } else {
            $client->gateway_2 = null;
        }
        $client->save();
        return redirect()->route('payment_system_admin:clients.index');
    }


    /**
     * Удаление клиента
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Request $request)
    {
        Client::where('id', $request->client_id)->delete();
        return redirect()->route('payment_system_admin:clients.index');
    }

}
