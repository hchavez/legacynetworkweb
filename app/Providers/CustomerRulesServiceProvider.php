<?php namespace App\Providers;

use App\User;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use Validator;

class CustomRulesServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('active_user', function ($attribute, $value, $parameters, $validator) {
            $user = User::where('email', '=', $value)->first();

            if ($user) {
                return $user->status != 'PENDING';
            }

            return false;
        });

        Validator::extend('active_purl', function ($attribute, $value, $parameters, $validator) {
            $user = User::where('purl', '=', $value)->first();

            if ($user) {
                return $user->status == 'ACTIVE';
            }

            return false;
        });

        Validator::extend('parseableDateInput', function ($attribute, $value, $parameters, $validator) {
            try {
                Carbon::parse($value);
            } catch (\Exception $e) {
                return false;
            }

            return true;
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

    }

}
