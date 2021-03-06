@extends('layouts.dash')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Welcome Admin! You are logged in!') }}
                    <a href = 'list_requests'> USER APPROVAL</a>
                    <a href = 'list_user'> USER MANAGEMENT</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
