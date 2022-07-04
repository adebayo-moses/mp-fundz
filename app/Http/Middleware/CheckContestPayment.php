<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Traits\QueryTrait;

class CheckContestPayment
{
    use QueryTrait;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //Get current contest from trait
        $current_contest = $this->getCurrentContest();

        if($current_contest !== null) {
            //There is active contest

            if ($current_contest->activate_payment) {
                //The active contest has payment

                //Get payment record
                $payment_record = $this->checkIfUserIsAttachedToContest();

                if ($payment_record == null) {
                    //No payment found, redirect home
                    return redirect('home');
                }
            }
        } else {
            //No contest found
            return redirect('home');
        }

        return $next($request);
    }
}
