<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\User;
use App\Wallet;
use Faker\Provider\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransferController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [
            'users' => User::where('id', '<>', Auth::user()->id)->get()
        ];

        return view('transfer')->with($data);
    }

    public function postTransfer(Request $request)
    {
        $userId = Auth::user()->id;
        $wallet = Wallet::where('user_id', $userId)->first();

        $total = (int)$request->total;


        if ($total <= (int)$wallet->saldo) {
            $wallet->saldo = $wallet->saldo - $total;
            $wallet->save();

            DB::table('transactions')->insert([
                'id' => Uuid::uuid(),
                'total' => $total,
                'from_user_id' => $userId,
                'to_user_id' => $request->username,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        }

        return redirect('home');


    }
}
