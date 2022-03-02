@extends('layouts.distributor_dashboard')

@section('content')
    <div class="inner-content-wrapper">
        <h2>Your Shopping Cart </h2> <i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i> {{ $count_item}} item(s) in your cart

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

                @if(session('success'))
                <div class="alert alert-success">{{session('success')}}</div>
                @endif

                <div class="product-details"><!--product-details-->
                   
                    <div class="col-sm-12">
                        <table class="table table-hover">
                           <thead class="thead-light">
                            <tr>
                              <th scope="col"></th>
                              <th scope="col">Product</th>
                              <th scope="col">Description</th>
                              <th scope="col">Price</th>
                              <th scope="col">Quantity</th>
                              <th scope="col">Total</th>
                              <th scope="col"></th>
                            </tr>
                          </thead>

                          <tbody>
                            <?php $overallTotal=0; ?>
                            @foreach ($updated_cart as $data)
                            <tr>
                              <td scope="row" width="150px"><img src="{{url('uploads/merchandise',$data->image)}}" alt="" id="dynamicImage" class="img-responsive" width="150px" /></td>
                               <td>{{ $data->product_name }} <br>
                                 @if($data->size) Size: {{ $data->size }} @endif <br>
                                  @if($data->color) Color: {{ $data->color }} @endif <br>
                              </td>
                              <td>{{ $data->product_description }}</td>
                              <td> $ {{ number_format($data->price, 2) }} </td>
                              <td> <input type="text" name="qty" value="{{ $data->quantity }}" class="form-control form-control-user" size="1" ></td>
                              <td> $ {{ number_format($data->price * $data->quantity, 2) }} </td>
                               <td> 
                                <button class="deleteRecord" data-id="{{ $data->id }}" >Remove</button>
                               </td>
                            </tr>
                            <?php
                                $overallTotal = $overallTotal + $data->price * $data->quantity;
                                $order_id =  $data->order_id;
                             ?>
                            @endforeach


                             <tr>
                              <td scope="row" width="150px"></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td><strong>Overall Total</strong></td>
                              <td><span><strong>$ {{ number_format($overallTotal, 2) }}</strong></span></td>
                                <td></td>
                            </tr>


                          </tbody>


                           <thead class="thead-light">
                            <tr>
                              <th scope="col"></th>
                              <th scope="col"><a href="{{ url('distributor/business_building/product_list') }}">Continue Shopping</a></th>
                              <th scope="col"></th>
                              <th scope="col"></th>
                              <th scope="col"><button>Update</button></th>
                              <th scope="col">
                                  <form action="{{route('checkout')}}" method="post" role="form">
                                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                                  <input type="hidden" name="user_id" class="form-control form-control-user" id="exampleFirstName" value="{{ Auth::user()->id }}" >
                                    <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
                                          <button type="submit" class="btn btn-primary cart" id="checkout">
                                              Checkout
                                          </button>
                                </form>
                              </th>
                               <th scope="col"></th>
                            </tr>
                          </thead>

                        </table>
                    </div>
                 
                </div>
         
{{session('')}}
        </div>
    </div>
@endsection

@section('scripts')
    
<script type="text/javascript">
  $(".deleteRecord").click(function(){
    var id = $(this).data("id");
    var token = $("meta[name='csrf-token']").attr("content");
   
    $.ajax(
    {
        url: "delete-item/"+id,
        type: 'GET',
        data: {
            "id": id,
            "_token": token,
        },
        success: function (){
            console.log("it Works");
            alert('Product Sucessfully Removed');
            location.reload();
        }


    });
   
});

</script>

    
@endsection
