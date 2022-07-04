<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use KingFlamez\Rave\Facades\Rave as Flutterwave;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use App\Http\Traits\QueryTrait;
use Illuminate\Http\Request;

class FlutterwaveController extends Controller
{
    use QueryTrait;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }


    /**
     * Initialize Rave payment process
     * @return void
     */
    public function initialize(Request $request)
    {
        //Get the current contest
        //Get current contest from trait
        $current_contest = $this->getCurrentContest();

        // $tx = Transaction::where('tx_ref', 'flw_16175430136069bf65b6f06')->first();

        // dd($tx->status !== 'processing');
        $user = $this->getUser();

        //This generates a payment reference
        $reference = Flutterwave::generateReference();

        $amount = $request->amount;

        //Add the transaction in the db
        Payment::create([
            'tx_ref' => $reference,
            'user_id' => $user->id,
            'contest_id' => $current_contest->id,
            'amount' => $amount,
        ]);

        // Enter the details of the payment
        $data = [
            'payment_options' => 'card,banktransfer',
            'amount' => $amount,
            'email' => $user->email,
            'tx_ref' => $reference,
            'currency' => "NGN",
            'redirect_url' => route('callback'),
            'customer' => [
                'email' => $user->email,
                // "phonenumber" => $request->input('phone'),
                "name" => $user->first_name . ' ' . $user->last_name
            ],

            "customizations" => [
                "title" => 'Contest Coin',
                "description" => 'Purchased today, ' . Carbon::now()
            ]
        ];

        $payment = Flutterwave::initializePayment($data);


        if ($payment['status'] !== 'success') {
            return redirect('/payment_failed')->with('error', 'Oops!, something went wrong!');
        }

        return redirect($payment['data']['link']);
    }


    /**
     * Obtain Rave callback information
     * @return void
     */
    public function callback()
    {
        $status = request()->status;

        //if payment is successful
        if ($status ==  'successful') {

            $transactionID = Flutterwave::getTransactionIDFromCallback();
            $data = Flutterwave::verifyTransaction($transactionID);

            // dd($data);
        } elseif ($status ==  'cancelled'){
            //Put desired action/code after transaction has been cancelled here
            $this->updateProcessingTransaction('cancelled');
            return redirect('home')->with('error', 'Transaction cancelled!');
        }
        else{
            //Put desired action/code after transaction has failed here
            $this->updateProcessingTransaction('failed');
            return redirect('home')->with('error', 'Transaction failed!');
        }

        // Get the transaction from your DB using the transaction reference (txref)
        $tx_ref = $data['data']['tx_ref'];
        $transaction = Payment::where('tx_ref', $tx_ref)->first();

        // Check if you have previously given value for the transaction. If you have, redirect to your successpage else, continue
        if($transaction->status == 'success') {
            return redirect('/payment_success')->with('success', 'Your purchase is complete, thank you for your purchase!');
        }

        // Confirm that the $data['data']['status'] is 'successful'
        if($data['data']['status'] !== 'successful') {
            return redirect('/payment_failed')->with('error', 'Oops!, your payment is not successful.');
        }

        // Confirm that the currency on your db transaction is equal to the returned currency
        if($data['data']['currency'] !== $transaction->currency) {
            return redirect('/payment_failed')->with('error', 'Oops!, The transaction currency is different from what we accept, please contact admin!');
        }

        // Confirm that the db transaction amount is equal to the returned amount
        if($transaction->amount > $data['data']['charged_amount']) {
            return redirect('/payment_failed')->with('error', 'Oops!, the amount charged is less than the amount you should pay.');
        }

        // Update the db transaction record (including parameters that didn't exist before the transaction is completed. for audit purpose)
        $payment_type = $data['data']['payment_type'];
        $transaction->update([
            'payment_type' => $payment_type
        ]);

        // Give value for the transaction //Give coin
        // $coin_value = '';
        // $transaction->amount == 250 ? $coin_value = '50.00' : $coin_value = '100.00';
        // //Get user
        // $user = $this->getUser();
        // $user->update([
        //     'coin_balance' => $user->coin_balance + $coin_value
        // ]);

        //Get current contest from trait
        $current_contest = $this->getCurrentContest();
        //Get user from trait
        $user = $this->getUser();
        //Attach user to contest
        $current_contest->users()->attach($user->id);

        // Update the transaction to note that you have given value for the transaction
        $transaction->update([
            'status' => 'success',
        ]);

        // Return redirect to contest videos page
        return redirect()->route('contest.show_videos');

    }

    public function payment_success() {
        return redirect()->route('home')->with('success', 'Great! Coin purchase successful!');
    }

    public function payment_failed() {
        return view('contest.payment_failed');
    }
}
