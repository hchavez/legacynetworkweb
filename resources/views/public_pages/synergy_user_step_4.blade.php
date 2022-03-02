@extends('layouts.frontend')
@section('page-title', 'Get Started | Legacy Network')
@section('content')
    <section class="main-content container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1>Synergy User Register - To Get Started, Complete all of the steps (4/5)</h1>
            </div>
        </div>
        <br>

        <form id="registration_form" action="{{ url('/synergy_user/step/4') }}" method="post">
            {{ csrf_field() }}
            <section>
                @if($errors->count() > 0)
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            @foreach($errors->all() as $error)
                                <span class="help-block"><span class="text-danger">{{ $error }}</span></span>
                            @endforeach
                        </div>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h4>Business System Subscription</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h2>{{ Cache::get('ln_fees_desc') }}</h2>
                        <div id="ln_fee_container" class="triggerChange">
                            @if($ln_fees->count())
                                @foreach($ln_fees as $item)
                                    <div class="form-group">
                                        @if($item->image)<img src="/uploads/avatars/{{ $item->image }}" alt=""/>@endif
                                        <div class="radio">
                                            <label @if ($ln_fees->count() == 1) style="padding-left: 0;" @endif>
                                                <input @if ($loop->first) checked @endif required type="radio"
                                                       data-value="{{ $item->price }}"
                                                       data-name="{{ $item->name }}"
                                                       name="ln_fee_id"
                                                       @if ($ln_fees->count() == 1) class="hidden" @endif
                                                       value="{{ $item->id }}"><strong>{{ $item->name }}</strong>
                                            </label>
                                        </div>
                                        <p>Price: <strong>${{ $item->price }}</strong></p>
                                        <p>{!! $item->description !!}</p>
                                    </div>
                                @endforeach
                            @else
                                <p class="error">Nothing seems to be here</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <button type="submit" class="btn btn-primary">Proceed To Next Step</button>
                    </div>
                </div>
            </section>
        </form>
    </section>
    <br>
    <br>
    @include('layouts.partials.sticky_footer')
@endsection


@section('scripts')
    @if($errors->count() > 0)
        <script>
            swal({
                title: 'Form validation failed',
                text: "Please check each field and try again",
                type: 'warning',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Ok'
            })
        </script>
    @endif
@endsection


