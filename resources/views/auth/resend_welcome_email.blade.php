@extends('layouts.auth')

@section('pageTitle','Resend Welcome Email')

@section('content')
    <div class="container">
        <div class="row row-offcanvas row-offcanvas-left">
            <form role="form" class="form-signin" action="{{ route('resend_welcome_email') }}" method="POST" >
                {{ csrf_field() }}
                <h2 class="form-signin-heading">
                    <img src="{{ asset('images/legacy-network-logo.png') }}" class="img-responsive">
                </h2>
                @if ($errors->has('email'))
                    <span class="alert-danger alert-dismissable">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
                <div class="alert alert-warning" style="margin-bottom:6px;">Enter the email address you used to register for legacynetwork.com</div>
                <input type="text" name="email" placeholder="Email Address" class="form-control" required>
                <button type="submit" class="btn btn-lg btn-primary btn-block">Resend Welcome Email</button>
                <button type="button" class="btn btn-lg btn-primary btn-block" onclick="window.location='{{ url('/login') }}';">Back to Sign-In</button>
            </form>
        </div>
    </div>
@endsection
