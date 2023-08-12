<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $user = User::where('email', $request["email"])->first();

        if (!isset($user)) {
            return back()->withErrors([
                'message' => 'メールアドレスまたはパスワードが間違っています。',
            ]);
        }

        if (isset($user) && $user->is_permitted == 0) {
            return back()->withErrors([
                'message' => 'あなたのアカウントは一時停止されました。 連絡をお待ちください。',
            ]);
        }

        if (isset($user) && $user->is_permitted == 1) {

            $request->authenticate();

            $request->session()->regenerate();


            return redirect()->intended(RouteServiceProvider::HOME);
        }

        return back()->withErrors([
            'error' => '提供されたクレデンシャルは、当社の記録と一致しません。',
        ]);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
