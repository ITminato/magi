<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserAdressCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $addressCheck = User::find(Auth::id());
        if($addressCheck->address == null && $addressCheck->address == '' && $addressCheck->address == null &&  $addressCheck->post_code == null ) {
            return redirect()->route('address_edit')->withErrors([
                'message' => '住所の登録が必要です。',
            ]);
        }
        return $next($request);
    }
}
