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
                                 <i class="fa fa-shopping-cart"></i> {{ $count_item }} item(s) 
                                View Cart
                            </button>
                </form>

        @endif
        </div>
        </div>
        
           <div class="row">
                @if ($errors->any())
                <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
                </ul>
                </div><br />
                @endif

                @if(session('error'))
                <div class="alert alert-danger">{{session('error')}}</div>
                @endif
                
                @if(session('success'))
                <div class="alert alert-success">{{session('success')}}</div>
                @endif
                
                <div class="product-details"><!--product-details-->

            <div class="col-sm-6">
                <div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails">
                    <a href="{{url('uploads/merchandise',$detail_product->image)}}">
                       <center> <img src="{{url('uploads/merchandise',$detail_product->image)}}" alt="" id="dynamicImage" class="img-responsive"/></center>
                    </a>
                </div>
            </div>
        
            <div class="col-sm-6">
                <form action="{{route('cart')}}" method="post" role="form">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" name="user_id" class="form-control form-control-user" id="exampleFirstName" value="{{ Auth::user()->id }}" >
                    <input type="hidden" name="product_id" value="{{$detail_product->id}}">
                    <input type="hidden" name="product_name" value="{{$detail_product->product_name}}">
                    <input type="hidden" name="sku" value="{{$detail_product->sku}}">
                    <input type="hidden" name="size" value="{{$detail_product->size}}">
                    <input type="hidden" name="color" value="{{$detail_product->color}}">
                   @if($count_item)
                     <input type="hidden" name="order_id" value="{{$cart->order_id}}">
                   @endif
                    <input type="hidden" name="price" value="{{$detail_product->price}}" id="dynamicPriceInput">
                    <div class="product-information"><!--/product-information-->
                    
                        <h2>{{$detail_product->product_name}}</h2>
                        <p>Description: {{$detail_product->product_description}}</p>
                        <p>Size: {{$detail_product->size}}</p>
                        <p>Color: {{$detail_product->color}}</p>
                        <p>Code ID: {{$detail_product->sku}}</p>
                        <span>
                            <span id="dynamic_price"><strong>Price:  ${{$detail_product->price}}</strong></span> <br> <br>
                            <label>Quantity:</label><br>
                            <input type="text" name="quantity" id="qty" required="required" />
                            @if($detail_product->stock>0) <br><br>
                            <button type="submit" class="btn btn-primary cart" id="buttonAddToCart">
                                <i class="fa fa-shopping-cart"></i>
                                Add to cart
                            </button>
                            @endif
                        </span>
                   
                        
                    </div><!--/product-information-->

                </form>
                <br>
            <a href="{{ url('distributor/business_building/product_list') }}"> Back to T-Shirt List </a>
            </div>
        </div
         

        </div>
    </div>

    <div class="modal fade" id="trainingModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" style="height: 1px !important;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Activate Member</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Has this person finished their Entrepreneurship Training and are they ready to be certified and activated?</h4>

                        </div>
                        <form action="" id="trainingForm" style="display: none">
                            <input type="hidden" name="user_id" id="user_id2"/>
                            <input type="hidden" name="is_training_done" id="is_training_done" value="1"/>
                        </form>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary submit-training-form">Activate</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
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
    */

    </script>
    
@endsection
