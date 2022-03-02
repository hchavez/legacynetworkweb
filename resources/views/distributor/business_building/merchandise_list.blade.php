@extends('layouts.distributor_dashboard')

@section('content')
    <div class="inner-content-wrapper">
               <div class="row"> 
        <div class="col-sm-9"><h2>Order your T-shirts Now!</h2>
        </div>
         <div class="col-sm-3">
        @if($count_item)
         
             <form action="{{route('cart')}}" method="post" role="form">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" name="user_id" class="form-control form-control-user" id="exampleFirstName" value="{{ Auth::user()->id }}" >
                     <input type="hidden" name="quantity" id="qty" value="" />
                      <input type="hidden" name="product_id" value="0">
                            <button type="submit" class="btn btn-primary cart" id="buttonAddToCart">
                                 <i class="fa fa-shopping-cart"></i> {{ $count_item}} item(s) 
                                View Cart
                            </button>
                </form>

        @endif
        </div>
        </div>

           <div class="row">
       @forelse ($products as $product)

               <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100" style="height: 450px !important; color: #000 !important;">
                  <a href="{{url('distributor/business_building/product',$product->id)}}">
                  
                    <img src="/uploads/merchandise/{{ $product->image }}" style="width:300px; height:300px; margin-top: 15px;">

                </a>
                  <div class="card-body">
                    <h4 class="card-title">
                      <a href="{{url('distributor/business_building/product',$product->id)}}">{{ $product->product_name }}</a>
                    </h4>
                    <h5> <strong> $ {{ $product->price }} </strong></h5>
                    <!-- @if ($product->product_description)
                    <p class="card-text">{{ $product->product_description }}</p>
                    @endif --> 
                    
                    <p class="card-text">@if ($product->size) Size: {{ $product->size }}@endif &nbsp; @if ($product->color) Color: {{ $product->color }}@endif</p>
                    
                  </div>
                  <div class="card-footer">
                
                      <a href="{{url('distributor/business_building/product',$product->id)}}" class="btn btn-primary add-to-cart">View Product</a>
                  </div>
                </div>
              </div>


                @empty
                    <div style="text-align: left">No items found</div>
                @endforelse

         

        </div>
    </div>

 </div>
@endsection

@section('scripts')
    
    <script type="text/javascript">
        /** $('.pending_placement').on('click', function() {
            $('#user_id').val($(this).data('id'));
            var $modal = $('#placementModal');
            $modal.modal('show');
        });

        $('.submit-placement-form').on('click', function() {
            var formData = $('#placementForm').serialize();

            $.ajax({
                url: '../set_placement',
                method: 'POST',
                dataType: 'json',
                data: formData,
                headers: getAjaxHeaders(),
                success: function () {
                    location.reload();
                }
            });
        });

        $('.set_training').on('click', function() {
            $('#user_id2').val($(this).data('id'));
            var $modal = $('#trainingModal');
            $modal.modal('show');
        });

        $('.submit-training-form').on('click', function() {
            var formData = $('#trainingForm').serialize();

            $.ajax({
                url: '../set_training_status',
                method: 'POST',
                dataType: 'json',
                data: formData,
                headers: getAjaxHeaders(),
                success: function () {
                    location.reload();
                }
            });
        });
    *//

    </script>
    
@endsection
