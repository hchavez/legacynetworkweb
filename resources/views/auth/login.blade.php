@extends('layouts.auth')

@section('pageTitle','Sign-In')

@section('content')
    <div class="container">
        <div class="row row-offcanvas row-offcanvas-left">

            <form role="form" class="form-signin" action="{{ route('login') }}" method="POST" >
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {{ csrf_field() }}
                <h2 class="form-signin-heading">
                    <img src="{{ asset('images/legacy-network-logo.png') }}" class="img-responsive">
                </h2>
                <input type="text" name="email" placeholder="Username/Email Address" class="form-control" required>
                <input type="password" placeholder="Password" name="password" class="form-control" required>
                <div class="pull-right">
                    <a href="{{ url('password/reset') }}">Forgot Password?</a><br>
                    <a href="{{ url('/resend_welcome_email') }}">Never received Welcome Email?</a>
                </div>
                <button type="submit" class="btn btn-lg btn-primary btn-block">Sign in</button>
                <input type="hidden" name="action" value="login">
            </form>
        </div>
    </div>
@endsection
