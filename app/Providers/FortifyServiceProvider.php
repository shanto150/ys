<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Fortify\Fortify;
use Illuminate\Support\Facades\Hash;
use App\Actions\Fortify\CreateNewUser;
use Illuminate\Support\ServiceProvider;
use Illuminate\Cache\RateLimiting\Limit;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use App\Actions\Fortify\UpdateUserProfileInformation;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        RateLimiter::for('login', function (Request $request) {
            $email = (string) $request->email;

            return Limit::perMinute(5)->by($email.$request->ip());
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });

        Fortify::authenticateUsing(function (Request $request) {


            $user = User::where('email', $request->email)->first();

            if ($user && Hash::check($request->password, $user->password)) {

                if ( $request->remember === null ) {
                    setcookie( 'login_email', $request->email, 100 );
                    setcookie( 'login_pass', $request->password, 100 );
                } else {
                    setcookie( 'login_email', $request->email, time()+60*60*24*100 );
                    setcookie( 'login_pass', $request->password, time()+60*60*24*100 );
                }
                return $user;

            }
            else {
                throw ValidationException::withMessages(['messege'=>'Username or Password Wrong.']);
            }

        });

        //Call Login
        Fortify::loginView(function () {
            return view('auth.login');
        });

        //Call Register
        Fortify::registerView(function () {
            return view('auth.register');
        });

        //send reset mail link
        Fortify::requestPasswordResetLinkView(function () {
            return view('auth.forgot-password');
        });

        //Call Reset Pas view
        Fortify::resetPasswordView(function ($request) {
            return view('auth.reset-password', ['request' => $request]);
        });

    }
}
