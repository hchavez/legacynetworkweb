@extends('layouts.auth')
@section('pageTitle', 'Register')
<?php
$fields = [
    [
        'key' => 'email',
        'label' => 'Email',
        'type' => 'email'
    ],
    [
        'key' => 'first_name',
        'label' => 'First Name',
        'type' => 'text'
    ],
    [
        'key' => 'middle_name',
        'label' => 'Middle Name',
        'type' => 'text'
    ],
    [
        'key' => 'last_name',
        'label' => 'Last Name',
        'type' => 'text'
    ],
    [
        'key' => 'date_of_birth',
        'label' => 'Date of Birth',
        'type' => 'date'
    ],
//        [
//                'key' => 'mailing_address_1',
//                'label' => 'Mailing Address 1',
//                'type' => 'text'
//        ],
//        [
//                'key' => 'mailing_address_2',
//                'label' => 'Mailing Address 2',
//                'type' => 'text'
//        ],
//        [
//                'key' => 'mailing_city',
//                'label' => 'Mailing City',
//                'type' => 'text'
//        ],
//        [
//                'key' => 'mailing_state',
//                'label' => 'Mailing State',
//                'type' => 'text'
//        ],
//        [
//                'key' => 'mailing_postal_code',
//                'label' => 'Mailing Postal Code',
//                'type' => 'text'
//        ],
//        [
//                'key' => 'mailing_country',
//                'label' => 'Mailing Country',
//                'type' => 'text'
//        ],
//        [
//                'key' => 'physical_address_1',
//                'label' => 'Shipping Address 1',
//                'type' => 'text'
//        ],
//        [
//                'key' => 'physical_address_2',
//                'label' => 'Shipping Address 2',
//                'type' => 'text'
//        ],
//        [
//                'key' => 'physical_city',
//                'label' => 'Shipping City',
//                'type' => 'text'
//        ],
//        [
//                'key' => 'physical_state',
//                'label' => 'Shipping State',
//                'type' => 'text'
//        ],
//        [
//                'key' => 'physical_postal_code',
//                'label' => 'Shipping Postal Code',
//                'type' => 'text'
//        ],
//        [
//                'key' => 'physical_country',
//                'label' => 'Shipping Country',
//                'type' => 'text'
//        ],
    [
        'key' => 'mobile',
        'label' => 'Mobile',
        'type' => 'text'
    ],
];
?>
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        @if(session()->has('purl_user'))
                                Welcome to the website of <span>{{ session()->get('purl_user')['name'] }}</span>
                        @endif
                        <a href="{{ url('') }}" class="btn btn-info btn-sm pull-right">Back</a>
                    </div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                            @if(session()->has('purl_user'))
                                <input type="hidden" name="purl" value="{{ session()->get('purl_user')['purl'] }}"/>
                            @else
                                <div class="form-group{{ $errors->has('purl') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">PURL</label>

                                    <div class="col-md-6">
                                        <input id="purl" type="purl" class="form-control" name="purl"
                                               value="{{ old('purl') }}" required>

                                        @if ($errors->has('purl'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('purl') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            @endif

                            @foreach($fields as $field)
                                <div class="form-group{{ $errors->has($field['key']) ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">{{ $field['label'] }}</label>

                                    <div class="col-md-6">
                                        <input id="{{ $field['key'] }}" type="{{ $field['type'] }}" class="form-control"
                                               name="{{ $field['key'] }}" value="{{ old($field['key']) }}">
                                        @if ($errors->has($field['key']))
                                            <span class="help-block">
                                                <strong>{{ $errors->first($field['key']) }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            @endforeach


                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
