@extends('layouts.distributor_dashboard')

@section('content')
    <div class="inner-content-wrapper">
        <h2>Order Business Cards</h2>
            
 
   <div class="row">
 <div class="col-md-12">
                <!-- Bar Chart -->
              
                <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"></h6>


                <div class="row">
                <!-- Area Chart -->
                <div class="col-xl-8 col-lg-8">

                <h3 style="color:#0072a1;margin-bottom:20px;"><center>CREATE BUSINESS CARD FORM</center></h3>
   
                <div>
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                
                </div>
                <!-- Card Body -->
                <div class="card-body">
                <div class="chart-area" style="padding: 20px;">

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


                <form id="payment_form" method="post" action="{{ route('order_card') }}">
                  {{ csrf_field() }}
                        <div class="form-group row">
                        <input type="hidden" name="user_id" class="form-control form-control-user" id="exampleFirstName" value="{{ Auth::user()->id }}" >
                        <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" name="name" class="form-control form-control-user" id="name" placeholder="Name" required="required">  <br>
                        </div>
                        <div class="col-sm-6">
                        <input type="text" name="title" class="form-control form-control-user" id="title" placeholder="Title" >
                        </div>
                        </div>


                        <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="email" name="email" id="email" class="form-control form-control-user" placeholder="Email Address"  required="required">  <br>
                        </div>
                        <div class="col-sm-6">
                        <input type="text" name="phone" id="phone" class="form-control form-control-user" placeholder="Contact"  required="required" >
                        </div>
                        </div>


                        <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" name="website" id="website" class="form-control form-control-user" placeholder="Website" >
                        </div>
                        <div class="col-sm-6">

                        </div>
                        </div>

                    
                        <hr>



             <input type="hidden" name="_token" value="{{csrf_token()}}">
             <input type="hidden" name="user_id" class="form-control form-control-user" id="exampleFirstName" value="{{ Auth::user()->id }}" >
             <input type="hidden" name="amount" value="40">
      
               <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cc_name" style="color: gray;">Cardholder's Name</label>
                            <input class="form-control" type="text" name="cc_name" id="cc_name" value="{{ old('cc_name') }}" required>
                            @if ($errors->has('cc_name'))
                                <span class="help-block"><strong>{{ $errors->first('cc_name') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="month_expire" style="color: gray;">Card Expiration</label>
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

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cc_number" style="color: gray;">Card No.</label>
                            <input class="form-control" type="text" name="cc_number" id="cc_number" value="{{ old('cc_number') }}" required>
                            @if ($errors->has('cc_number'))
                                <span class="help-block"><strong>{{ $errors->first('cc_number') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="cc_cvv" style="color: gray;">Card Security Code (CVV)</label>
                            <input class="form-control" type="text" name="cc_cvv" id="cc_cvv" value="{{ old('cc_cvv') }}" required>
                            @if ($errors->has('cc_cvv'))
                                <span class="help-block"><strong>{{ $errors->first('cc_cvv') }}</strong></span>
                            @endif
                        </div>
                    </div>
                </div>

                      <br>
                        <hr>
                    <div class="row"><center>
                        <button type="submit" id="submit_btn" class="btn btn-primary">Place Order</button><br></center>
                    </div>
                </form>
                </div>
                </div>
                </div>
                </div>

                <!-- Pie Chart -->
                <div class="col-xl-4 col-lg-4">
                <div class="shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center left-content-between">
                
                 <h3 style="color:#0072a1;"><center> BUSINESS CARD PREVIEW</center></h3>
                <br>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                <!-- <div>
                <img src="/uploads/businesscard-front.jpg" style="border: black !important; border-style: double !important; width: 100%; max-width: 400px;">
                </div> -->

                <div style="border: black !important; border-style: double !important; background-color: #fff !important;">
                <img src="/uploads/frontbusinesscard.jpg" style="width: 100%;">

                 <p style='padding-left: 60px;'>
                <span id="name_bc" style='font-family:"Cabin Condensed",Helvetica,Arial,Sans-serif;font-size:26px; color: #00acef; text-transform: uppercase;'>NAME</span><br>
                <span id="title_bc" style='font-family:"Cabin Condensed",Helvetica,Arial,Sans-serif;font-size:20px; color: gray;'>title</span>
                </p>
                <p style="padding-left: 60px;" ><span id="website_bc" style='font-family:"Cabin Condensed",Helvetica,Arial,Sans-serif;font-size:16px;'>Website Link</span><br>
                <span id="email_bc" style='font-family:"Cabin Condensed",Helvetica,Arial,Sans-serif;font-size:16px;'> email </span><br>
                <span id="phone_bc" style='font-family:"Cabin Condensed",Helvetica,Arial,Sans-serif;font-size:16px;'> phone </span></p><br><br>
                </div>



                <div class="mt-4 text-center small">
                        &nbsp;
                </div>
                </div>
                </div>
                </div>
               


                </div>
                <div class="card-body">
                <div class="main-content"> 



                <table class="table table-striped table-bordered table-hover" id="referrals_list" style="font-size: 13px;">
                <thead>
                <tr>
                <th>Order No</th>
                <th>Date Ordered</th>
                <th>Status</th>

                </tr>
                </thead>
                <tbody>
                @foreach( $cards as $key => $value)
                <tr>
                <td>{{ $value->id }}</td>
                <td class="text-capitalize"> {{ $value->created_at->format('m/d/Y h:i:s')}}  </td>
                <td class="text-capitalize"> {{ $value->status }} </td>

                </tr>
                @endforeach


                </tbody>
                </table> 
                </div>
                </div>
                </div>
                </div>
                </div>
    </div>
</div>




@endsection

<style type="text/css">
    
    .fontBCsmall{
        color: #2b2c2c;
        font-family: "Cabin Condensed",Helvetica,Arial,Sans-serif;
    }
</style>

@section('scripts')

    <script type="text/javascript">

        $(function() { 

        $('#name').change(function() {
        $('#name_bc').text( $('#name').val() ); 
        });

        $('#title').change(function() {
        $('#title_bc').text( $('#title').val() ); 
        });

        $('#email').change(function() {
        $('#email_bc').text( $('#email').val() ); 
        });

        $('#phone').change(function() {
        $('#phone_bc').text( $('#phone').val() ); 
        });

        $('#website').change(function() {
        $('#website_bc').text( $('#website').val() ); 
        });
        }); 


        $('#payment_form').on('submit', function(e) {
            e.preventDefault();

            $('#submit_btn').attr("disabled", "disabled").html('Please Wait...');

            $(this).unbind().submit();
        })

        </script>
   
@endsection



