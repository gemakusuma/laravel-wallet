@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div style="text-align: right; margin-bottom: 10px;">
                            <a href="/transfer" class="btn btn-primary">Transfer</a>
                        </div>

                        <table class="table table-bordered">
                            <thead>
                            <tr style="text-align: center">
                                <td>Transfer Ke</td>
                                <td>Total</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($transactions as $transaction)
                                <tr style="text-align: center">
                                    <td>{{ \App\User::where('id', $transaction->to_user_id)->first()->username }}</td>
                                    <th>{{$transaction->total}}</th>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
