<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    /**
     * Вывод пользователей админки
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $admin_users = User::all();
        return view('admin_users.index', ['data' => [
            'admin_users'   => $admin_users,
            'route' => $request->route()->getName(),
            'query' => is_null($request->getQueryString()) ? '' : '?'. $request->getQueryString(),
        ]]);
    }

    /**
     * Добавление/удаление пользователя админки из списка рассылки
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function do_mailing(Request $request)
    {
        $admin_user = User::where('id', $request->admin_user_id)->first();

        $admin_user->do_mailing = ($request->admin_user_do_mailing == 1) ? 0 : 1;

        $admin_user->save();

        return redirect()->route('payment_system_admin:admin_users.index');

    }
}
