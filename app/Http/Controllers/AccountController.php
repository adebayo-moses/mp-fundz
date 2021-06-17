<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index() {

        $user_accounts = Account::where('user_id', Auth::id())->get();

        return view('users.account.index')->with('user_accounts', $user_accounts);
    }

    public function withdraw() {

        return view('users.account.withdraw');
    }

    public function add() {
        return view('users.account.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'account_name' => 'required',
            'account_number' => 'required|digits_between:10,11',
            'bank_name' => 'required',
        ]);


        if(Account::create([
            'account_name' => $request->input('account_name'),
            'account_number' => $request->input('account_number'),
            'bank_name' => $request->input('bank_name'),
            'user_id' => Auth::id()

        ])) {
            return redirect()->route('user.account.index')->with('success', 'Great! Your account is submitted successfully.');
        };
    }
}
