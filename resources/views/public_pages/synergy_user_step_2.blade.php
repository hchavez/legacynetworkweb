@extends('layouts.frontend')
@section('page-title', 'Get Started | Legacy Network')
@section('content')
    <section class="main-content container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1>Synergy User Register - To Get Started, Complete all of the steps (2/5)</h1>
            </div>
        </div>
        <br>

        @if(session('registration_synergy_step_0')['elite_challenge_participant'] == 1)
            <form id="registration_form" action="{{ url('/synergy_user/step/2') }}" method="post">
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
                            <h4>Synergy Activation Fee</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="form-group">
                                @if($synergy_activation_product->image)<img class='img-responsive' src="/uploads/avatars/{{ $synergy_activation_product->image }}" alt=""/>@endif
                                <div class="radio">
                                    <label @if ($activation_packs->count() == 1) style="padding-left: 0;" @endif>
                                        <input checked required type="radio" name="product_id" @if ($activation_packs->count() == 1) class="hidden" @endif value="{{ $synergy_activation_product->id }}"><strong>{{ $synergy_activation_product->name }}</strong>
                                    </label>
                                </div>
                                <p>Price: <strong>${{ $synergy_activation_product->price }}</strong></p>
                                <p>{!! $synergy_activation_product->description !!}</p>
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
        @else
            <form id="registration_form" action="{{ url('/synergy_user/step/2') }}" method="post">
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
                            <h4>Activation Pack</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <h2>{{ Cache::get('activation_pack_desc') }}</h2>
                            @if($activation_packs->count())
                                @foreach($activation_packs as $item)
                                    <div class="form-group">
                                        @if($item->image)<img src="/uploads/avatars/{{ $item->image }}" alt=""/>@endif
                                        <div class="radio">
                                            <label @if ($activation_packs->count() == 1) style="padding-left: 0;" @endif>
                                                <input @if ($loop->first) checked @endif required type="radio" name="activation_pack_id" @if ($activation_packs->count() == 1) class="hidden" @endif value="{{ $item->id }}"><strong>{{ $item->name }}</strong>
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
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <button type="submit" class="btn btn-primary">Proceed To Next Step</button>
                        </div>
                    </div>
                </section>
            </form>
        @endif


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


