<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Actions\RedirectIfTwoFactorAuthenticatable;
use Laravel\Fortify\Fortify; // <-- Nuestra importación clave

class FortifyServiceProvider extends ServiceProvider{

    public function register(): void{
            // Le ordenamos a Laravel usar nuestra lógica personalizada para Login y Registro
            $this->app->singleton(
                \Laravel\Fortify\Contracts\LoginResponse::class,
                \App\Http\Responses\LoginResponse::class
            );
            
            $this->app->singleton(
                \Laravel\Fortify\Contracts\RegisterResponse::class,
                \App\Http\Responses\LoginResponse::class
            );
        }


    public function boot(): void{
        // 1. Le decimos a Fortify qué vista cargar para el Login
        Fortify::loginView(function () {
            return view('auth.login');
        });

        // 2. Le decimos a Fortify qué vista cargar para el Registro
        Fortify::registerView(function () {
            return view('auth.register');
        });

        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);
        Fortify::redirectUserForTwoFactorAuthenticationUsing(RedirectIfTwoFactorAuthenticatable::class);

        RateLimiter::for('login', function (Request $request) {
            $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())).'|'.$request->ip());

            return Limit::perMinute(5)->by($throttleKey);
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });
    }
}