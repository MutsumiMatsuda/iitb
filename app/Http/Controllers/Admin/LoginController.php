<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    // ログインページ表示
    public function index() {
      return view('admin.login');
    }

    //ログイン処理
    public function login(Request $request)
    {
      $credentials = $request->only(['email', 'password']);

      //ユーザー情報が見つかったらログイン
      if (Auth::guard('admin')->attempt($credentials)) {
        //ログイン後に表示するページにリダイレクト
        return redirect()->route('admin.dashboard')->with([
          'login_msg' => 'ログインしました。',
        ]);
      }

      //ログインできなかったときに元のページに戻る
      return back()->withErrors([
        'login' => ['ログインに失敗しました'],
      ]);
    }

    //ログアウト処理
    public function logout(Request $request)
    {
      Auth::guard('admin')->logout();
      $request->session()->regenerateToken();

      //ログインページにリダイレクト
      return redirect()->route('admin.login.index')->with([
        'logout_msg' => 'ログアウトしました',
      ]);
    }
}