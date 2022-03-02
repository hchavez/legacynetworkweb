@extends('layouts.distributor_dashboard')

@section('content')
    <div class="inner-content-wrapper">
     
          <h2><i class="fa fa-shopping-cart fa-1x" aria-hidden="true"></i> Order Confirmation</h2> 

           <div class="row">

                @if(session('success'))
                <div class="alert alert-success">{{session('success')}}</div>
                @endif
          
          </div>
    </div>
@endsection

@section('scripts')
  

    
@endsection
