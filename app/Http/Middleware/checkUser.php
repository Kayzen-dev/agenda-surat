<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class checkUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (Auth::check()) {
                $authID = Auth::user()->id;
                $user = User::find($authID);
        
            // if ($user->hasRole('admin')) {
            //     if (!$user->admin) {
            //         return redirect()->route('guest.page');
            //     }
            // } elseif ($user->hasRole('guru') || $user->hasRole('kesiswaan')) {
            //     if (!$user->guru) {
            //         return redirect()->route('guest.page');
            //     }
            // } elseif ($user->hasRole('siswa')) {
            //     if (!$user->siswa) {
            //         return redirect()->route('guest.page');
            //     }

            // } else {
            //     return redirect()->route('guest.page');
            // }

            if($user->status_login == false){
                return redirect()->route('login')->with('error_message', 'Anda Dikeluarkan Dari sesi');
            }
            

        }


        return $next($request);
    }
}
