<?php

namespace App\Http\Middleware;

use Closure;
use Route;

class RedirectInactiveUsers
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (user()->status === 'INACTIVE' && $request->path() !== 'distributor/settings/update_payment_info') {
            return redirect('distributor/settings/update_payment_info')->with('activate_message', 'Oops! Looks like your Legacy Network subscription is inactive. Your credit card may have expired or been declined, or you may have cancelled your subscription. To reactivate your account and restore access to your personal marketing website and Dashboard tools, please enter your information below to update your payment information.');
        }
        return $next($request);
    }
}
