@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Forgot Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST">
                        @csrf
                        <label> Email Address: </label>
                        <input type="email" name="email" class="form-control form-control-sm"/>
                        <small class="form-text text-muted">Enter the email address you used. Then we'll email a link to this address.</small> 
                        <button class="btn btn-primary mt-2 btn-sm">
                            Get New Password 
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection