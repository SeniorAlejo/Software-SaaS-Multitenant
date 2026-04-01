<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Laravel\Fortify\Contracts\RegisterResponse as RegisterResponseContract; // <-- ¡La placa oficial para registros!

class LoginResponse implements LoginResponseContract, RegisterResponseContract
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function toResponse($request)
    {
        $user = $request->user();

        // Si es el soberano, va al panel de Filament
        if ($user && $user->hasRole('superadmin')) {
            return redirect('/admin');
        }

        // Si es cliente normal, va a su dashboard
        return redirect('/dashboard');
    }
}