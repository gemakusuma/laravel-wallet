@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Transfer</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div>
                            <form method="post" action="/transfer/post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputUsername">Username</label>
                                    <select name="username" id="" class="form-control">
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}">{{$user->username}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Total</label>
                                    <input type="number" class="form-control" id="exampleInputTotal"
                                           placeholder="Total" name="total">
                                </div>
                                <input type="submit" class="btn btn-primary" style="float: right;" value="Kirim">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
