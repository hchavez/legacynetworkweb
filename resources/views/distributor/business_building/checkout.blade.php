@extends('layouts.distributor_dashboard')

@section('content')
    <div class="inner-content-wrapper">
     
          <h2><i class="fa fa-shopping-cart fa-1x" aria-hidden="true"></i> Order Summary</h2> 

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
          
           
          </div>


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
                              <td> {{ $data->quantity }}</td>
                              <td> $ {{ number_format($data->price * $data->quantity, 2) }} </td>
                               <td> 
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
                            </tr>


                          </tbody>


                    

                        </table>

         <h2><i class="fa fa-credit-card fa-1x" aria-hidden="true"></i> Payment Information</h2> 

       <div class="row">

        <form id="payment_form" action="{{ url('/distributor/business_building/confirm_payment') }}" method="post">

            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="user_id" class="form-control form-control-user" id="exampleFirstName" value="{{ Auth::user()->id }}" >
            <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
             <input type="hidden" name="amount" value="<?php echo $overallTotal; ?>">
      
                <div class="row">
                    <div class="col-md-5 col-md-offset-1">
                        <div class="form-group">
                            <label for="cc_name">Cardholder's Name</label>
                            <input class="form-control" type="text" name="cc_name" id="cc_name" value="{{ old('cc_name') }}" required>
                            @if ($errors->has('cc_name'))
                                <span class="help-block"><strong>{{ $errors->first('cc_name') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="month_expire">Card Expiration</label>
                            <select name="month_expire" id="month_expire" required>
                                @for($x = 1; $x <= 12; $x++)
                                    <option value="{{ str_pad($x, 2, "0", STR_PAD_LEFT) }}">{{ str_pad($x, 2, "0", STR_PAD_LEFT) }}</option>
                                @endfor
                            </select>
                            <select name="year_expire" id="year_expire" required>
                                @for($x = 0; $x < 15; $x++)
                                    <option value="{{ \Illuminate\Support\Carbon::now()->addYear($x)->format('Y') }}">{{ \Illuminate\Support\Carbon::now()->addYear($x)->format('Y') }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="cc_number">Card No.</label>
                            <input class="form-control" type="text" name="cc_number" id="cc_number" value="{{ old('cc_number') }}" required>
                            @if ($errors->has('cc_number'))
                                <span class="help-block"><strong>{{ $errors->first('cc_number') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="cc_cvv">Card Security Code (CVV)</label>
                            <input class="form-control" type="text" name="cc_cvv" id="cc_cvv" value="{{ old('cc_cvv') }}" required>
                            @if ($errors->has('cc_cvv'))
                                <span class="help-block"><strong>{{ $errors->first('cc_cvv') }}</strong></span>
                            @endif
                        </div>
                    </div>
                </div>

                 <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <button type="submit" id="submit_btn" class="btn btn-primary">Place Order</button>
                    </div>
                </div>


                   </form>
            </div>
    </div>
@endsection

@section('scripts')
    

        <script>

        $('#payment_form').on('submit', function(e) {
            e.preventDefault();

            $('#submit_btn').attr("disabled", "disabled").html('Please Wait...');

            $(this).unbind().submit();
      })

    </script>

    
@endsection
