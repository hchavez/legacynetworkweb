@extends('layouts.auth')

@section('pageTitle','Forgot Password')

@section('content')
    <div class="container">
        <div class="row row-offcanvas row-offcanvas-left">
            <form role="form" class="form-signin" action="{{ route('password.email') }}" method="POST">
                {{ csrf_field() }}
                <h2 class="form-signin-heading">
                    <img src="{{ asset('images/legacy-network-logo.png') }}" class="img-responsive">
                </h2>
                @if ($errors->has('email'))
                    <span class="alert-danger alert-dismissable">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
                <div class="alert alert-warning" style="margin-bottom:6px;">
                    Enter the email address you used to register for legacynetwork.com
                </div>
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Username/Email Address" autofocus>

                <div style="text-align:center;padding:6px 0;font-weight:bold;">OR</div>
                <div class="alert alert-warning" style="margin-bottom:6px;">Enter the Synergy Distributor ID#</div>
                <input type="text" autofocus="" name="synergy_id"  value="{{ old('synergy_id') }}" placeholder="Synery Distributor ID#" class="form-control">
                <br>
                <button type="submit" class="btn btn-lg btn-primary btn-block">Send Password Reset Request</button>
                <button type="button" class="btn btn-lg btn-primary btn-block"
                        onclick="window.location='{{ url('/login') }}';">Back to Sign-In
                </button>
            </form>
        </div>
    </div>
@endsection
