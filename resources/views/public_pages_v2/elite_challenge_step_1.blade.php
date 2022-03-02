@extends('layouts.frontend')
@section('page-title', 'Step 1 | Elite Challenge | Legacy Network')
@section('content')
    <section class="main-content container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
               <h1>To get started, first, select a product package</h1>
            </div>
        </div>
        <br>

        <form id="registration_form" action="{{ url('/elite_challenge/step/1') }}" method="post">
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
                        <h4>Challenge Pack</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        @foreach($products as $item)
                            <div class="form-group">
                    

            
                               
                <div class="row">
                            
                                  <div class="col-sm-8"><div class="radio">
                                    <label @if ($products->count() == 1) style="padding-left: 0;" @endif>
                                        <input @if ($loop->first) checked @endif required type="radio" name="product_id" @if ($products->count() == 1) class="hidden" @endif value="{{ $item->id }}"><strong>{{ $item->name }}</strong>
                                    </label>
                                </div>
                                
                                <textarea rows='9' readonly style='border: none; padding: 0; margin: 0; width: 100%; overflow:auto;'>{!! $item->description !!}</textarea>

                                <p>Item# <strong>${{ $item->sku }}</strong><br>
                                Price: <strong>${{ $item->price }}</strong></p></div>
                                  <div class="col-sm-4"> @if($item->image)<img class='img-responsive' src="/uploads/avatars/{{ $item->image }}" alt=""/>@endif</div>
                                </div>

                            </div>

                        @endforeach
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


