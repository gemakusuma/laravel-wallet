<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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
            'transactions' => Transaction::where(function ($query) {
                $query->where('from_user_id', Auth::user()->id)
                    ->orWhere('to_user_id', Auth::user()->id);
            })->get()
        ];

        return view('home')->with($data);
    }
}
