@extends('layouts.frontend')
@section('page-title', 'Get Started | Legacy Network')
@section('content')
    <section class="main-content container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1>To Get Started, Complete all of the steps (3/5)</h1>
            </div>
        </div>
        <br>

        <form id="registration_form" action="{{ url('/register_user/step/3') }}" method="post">
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
                        <h2>Autoship Product Packs: <span style="font-size: 85%">Select one of the product packs below as your monthly autoship. This order will be processed approximately one month from now. This amount of product (150CV) is what qualifies you to earn your commissions. This product purchase along with your Legacy Network subscriptions fee is what makes up your monthly business overhead. You have total flexibility with this order. You can change it as often as you like and you can cancel it if you need.</span></h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h2>{{ Cache::get('auto_ships_desc') }}</h2>
                        @if($auto_ships->count())
                            @foreach($auto_ships as $item)
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="radio">
                                                <label>
                                                    <input @if ($loop->first) checked @endif
                                                    required type="radio" name="auto_ship_id"
                                                           data-value="{{ $item->price }}"
                                                           data-name="{{ $item->name }}"
                                                           value="{{ $item->id }}">
                                                    <strong>{{ $item->name }}</strong>
                                                </label>
                                            </div>
                                            <p>Price: <strong>${{ $item->price }}</strong></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        @if($item->image)<img class="img-responsive" src="/uploads/avatars/{{ $item->image }}" alt=""/>@endif
                                    </div>
                                    <div class="col-md-6">
                                        <p>{!! $item->description !!}</p>
                                    </div>
                                </div>
                                <hr>
                            @endforeach
                        @else
                            <p class="error">Nothing seems to be here</p>
                        @endif
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


