@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Welcome') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Welcome Fligno Inventory') }}
                    <br>
                    <a href="login_user">Login</a>
                    <br>
                    <a href="register_route">Register</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
