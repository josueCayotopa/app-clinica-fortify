<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Models\User;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);
        
        Fortify::loginView(function () {
            return view('auth.login');
        });
        Fortify::registerView(function () {
            return view('auth.register');
        });
        Fortify::requestPasswordResetLinkView(function () {
            return view('auth.passwords.email');
        });
        Fortify::resetPasswordView(function ($request) {
            return view('auth.passwords.reset', ['request' => $request]);
        });
        Fortify::verifyEmailView(function () {
            return view('auth.verify');
        });


        Fortify::authenticateUsing(function (Request $request) {
            $user = User::where('email', $request->username)
            ->orWhere('username',$request->username)
            ->first();
     
            if ($user &&
                Hash::check($request->password, $user->password)) {
                return $user;
            }
        });
         // Configuración de rate limiting
         RateLimiter::for('login', function (Request $request) {
            $username = (string) $request->username;

            return Limit::perMinute(3)->by($username . $request->ip())->response(function (Request $request, array $headers) {
                $retryAfter = $headers['Retry-After'][0] ?? 60; // Default to 60 seconds if header is not set
                return redirect()->route('tooManyRequests', ['retry_after' => $retryAfter]);
            });
        });



       
    }
}
