@extends('layouts.distributor_dashboard')

@section('content')




<div class="inner-content-wrapper">
                    <h2>Share Tool Reports</h2>
                      <button style="margin-bottom: 10px" class="btn btn-primary delete_all" data-url="{{ url('distributor/tools/invite_delete_all') }}">Delete All Selected</button>

                    <table class="table">
                        <thead>
                        <thead>
                        <tr style="font-size: 12px;">
                            <td style="width: 1px !important; padding: 1px !important; text-align: center !important;"><input type="checkbox" id="master"></td>
                            <th>Name & Date Submitted</th>
                            <th>Link & Message Type</th>
                            <th>Track Data</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody style="font-size: 12px;">
                        
                       @foreach($user_invites as $invite)
                          

                                 <tr id="tr_{{$invite->id}}"> <td> <input type="checkbox" class="sub_chk" data-id="{{$invite->id}}"></td>
                              
                                <td>{{ $invite->name }} <br> {{ $invite->created_at->format('m/d/Y h:i:s')}}</td>
                                <td> 
                                    <a href="http://dev.legacynetwork.com/shared/{{ $invite->id }}">http://dev.legacynetwork.com/shared/{{ $invite->id }}</a> <br> 
                                    {{ $invite->type }}
                                </td>
                            
                                <td colspan="2" > 


                                <div class="md-stepper-horizontal orange">
                                     @foreach($invite->send_invite_titles as $invite_title)

                                       


                            

                                        <div class="md-step <?php if ($invite->views == 0): ?> <?php else: ?> active <?php endif; ?>">
                                              <div class="md-step-circle"><span> <?php if ($invite->views == 0): ?> 0 <?php else: echo $invite->views; endif; ?></span></div>
                                              <div class="md-step-optional">Open/Read Email </div>
                                              <div class="md-step-bar-left"></div>
                                              <div class="md-step-bar-right"></div>
                                        </div>
                                          

                                        <?php if ($invite_title->title_1):?>
                                            <div class="md-step <?php if ($invite_title->count_1  == 0): ?> <?php else: ?> active <?php endif; ?>">
                                            <div class="md-step-circle"><span> <?php if ($invite_title->count_1  == 0): ?> 0 <?php else: echo $invite_title->count_1; endif; ?></span></div>
                                            <div class="md-step-optional"> {{ $invite_title->title_1 }} </div>
                                            <div class="md-step-bar-left"></div>
                                            <div class="md-step-bar-right"></div>
                                            </div>
                                        <?php endif; ?>

                                        <?php if ($invite_title->title_2):?>
                                            <div class="md-step <?php if ($invite_title->count_2 == 0): ?> <?php else: ?> active <?php endif; ?>">
                                            <div class="md-step-circle"><span> <?php if ($invite_title->count_2  == 0): ?> 0 <?php else: echo $invite_title->count_2; endif; ?></span></div>
                                            <div class="md-step-optional"> {{ $invite_title->title_2 }} </div>
                                            <div class="md-step-bar-left"></div>
                                            <div class="md-step-bar-right"></div>
                                            </div> <br>
                                        <?php endif; ?>
                                      
                                        <?php if ($invite_title->title_3):?>
                                            <div class="md-step <?php if ($invite_title->count_3 == 0): ?> <?php else: ?> active <?php endif; ?>">
                                            <div class="md-step-circle"><span> <?php if ($invite_title->count_3  == 0): ?> 0 <?php else: echo $invite_title->count_3; endif; ?></span></div>
                                            <div class="md-step-optional"> {{ $invite_title->title_3 }} </div>
                                            <div class="md-step-bar-left"></div>
                                            <div class="md-step-bar-right"></div>
                                            </div> 
                                        <?php endif; ?>

                                        

                                        
                                        <?php if ($invite_title->title_4):?>
                                            <div class="md-step <?php if ($invite_title->count_4 == 0): ?> <?php else: ?> active <?php endif; ?>">
                                            <div class="md-step-circle"><span> <?php if ($invite_title->count_4  == 0): ?> 0 <?php else: echo $invite_title->count_4; endif; ?></span></div>
                                            <div class="md-step-optional"> {{ $invite_title->title_4 }} </div>
                                            <div class="md-step-bar-left"></div>
                                            <div class="md-step-bar-right"></div>
                                            </div> 
                                        <?php endif; ?>

                                        <?php if ($invite_title->title_5):?>
                                            <div class="md-step <?php if ($invite_title->count_5 == 0): ?> <?php else: ?> active <?php endif; ?>">
                                            <div class="md-step-circle"><span> <?php if ($invite_title->count_5  == 0): ?> 0 <?php else: echo $invite_title->count_5; endif; ?></span></div>
                                            <div class="md-step-optional"> {{ $invite_title->title_5 }} </div>
                                            <div class="md-step-bar-left"></div>
                                            <div class="md-step-bar-right"></div>
                                            </div> <br>
                                        <?php endif; ?>

                                        <?php if ($invite_title->title_6):?>
                                            <div class="md-step <?php if ($invite_title->count_6 == 0): ?> <?php else: ?> active <?php endif; ?>">
                                            <div class="md-step-circle"><span> <?php if ($invite_title->count_6  == 0): ?> 0 <?php else: echo $invite_title->count_6; endif; ?></span></div>
                                            <div class="md-step-optional"> {{ $invite_title->title_6 }} </div>
                                            <div class="md-step-bar-left"></div>
                                            <div class="md-step-bar-right"></div>
                                            </div> 
                                        <?php endif; ?>

                                        <?php if ($invite_title->title_7):?>
                                            <div class="md-step <?php if ($invite_title->count_7 == 0): ?> <?php else: ?> active <?php endif; ?>">
                                            <div class="md-step-circle"><span> <?php if ($invite_title->count_7  == 0): ?> 0 <?php else: echo $invite_title->count_7; endif; ?></span></div>
                                            <div class="md-step-optional"> {{ $invite_title->title_7 }} </div>
                                            <div class="md-step-bar-left"></div>
                                            <div class="md-step-bar-right"></div>
                                            </div>
                                        <?php endif; ?>

                                        <?php if ($invite_title->title_8):?>
                                            <div class="md-step <?php if ($invite_title->count_8 == 0): ?> <?php else: ?> active <?php endif; ?>">
                                            <div class="md-step-circle"><span> <?php if ($invite_title->count_8  == 0): ?> 0 <?php else: echo $invite_title->count_8; endif; ?></span></div>
                                            <div class="md-step-optional"> {{ $invite_title->title_8 }} </div>
                                            <div class="md-step-bar-left"></div>
                                            <div class="md-step-bar-right"></div>
                                            </div>  <br>
                                        <?php endif; ?>

                                        <?php if ($invite_title->title_9):?>
                                            <div class="md-step <?php if ($invite_title->count_9 == 0): ?> <?php else: ?> active <?php endif; ?>">
                                            <div class="md-step-circle"><span> <?php if ($invite_title->count_9 == 0): ?> 0 <?php else: echo $invite_title->count_9; endif; ?></span></div>
                                            <div class="md-step-optional"> {{ $invite_title->title_9 }} </div>
                                            <div class="md-step-bar-left"></div>
                                            <div class="md-step-bar-right"></div>
                                            </div> 
                                        <?php endif; ?>

                                        <?php if ($invite_title->title_10):?>
                                            <div class="md-step <?php if ($invite_title->count_10 == 0): ?> <?php else: ?> active <?php endif; ?>">
                                            <div class="md-step-circle"><span> <?php if ($invite_title->count_10  == 0): ?> 0 <?php else: echo $invite_title->count_10; endif; ?></span></div>
                                            <div class="md-step-optional"> {{ $invite_title->title_10 }} </div>
                                            <div class="md-step-bar-left"></div>
                                            <div class="md-step-bar-right"></div>
                                            </div>
                                        <?php endif; ?>

                                        <?php if ($invite_title->title_11):?>
                                            <div class="md-step <?php if ($invite_title->count_11== 0): ?> <?php else: ?> active <?php endif; ?>">
                                            <div class="md-step-circle"><span> <?php if ($invite_title->count_11  == 0): ?> 0 <?php else: echo $invite_title->count_11; endif; ?></span></div>
                                            <div class="md-step-optional"> {{ $invite_title->title_11 }} </div>
                                            <div class="md-step-bar-left"></div>
                                            <div class="md-step-bar-right"></div>
                                            </div> <br>
                                        <?php endif; ?>

                                        <?php if ($invite_title->title_12):?>
                                            <div class="md-step <?php if ($invite_title->count_12 == 0): ?> <?php else: ?> active <?php endif; ?>">
                                            <div class="md-step-circle"><span> <?php if ($invite_title->count_12  == 0): ?> 0 <?php else: echo $invite_title->count_12; endif; ?></span></div>
                                            <div class="md-step-optional"> {{ $invite_title->title_12 }} </div>
                                            <div class="md-step-bar-left"></div>
                                            <div class="md-step-bar-right"></div>
                                            </div> 
                                        <?php endif; ?>

                                        <?php if ($invite_title->title_13):?>
                                            <div class="md-step <?php if ($invite_title->count_13 == 0): ?> <?php else: ?> active <?php endif; ?>">
                                            <div class="md-step-circle"><span> <?php if ($invite_title->count_13  == 0): ?> 0 <?php else: echo $invite_title->count_13; endif; ?></span></div>
                                            <div class="md-step-optional"> {{ $invite_title->title_13 }} </div>
                                            <div class="md-step-bar-left"></div>
                                            <div class="md-step-bar-right"></div>
                                            </div>
                                        <?php endif; ?>

                                        <?php if ($invite_title->title_14):?>
                                            <div class="md-step <?php if ($invite_title->count_14 == 0): ?> <?php else: ?> active <?php endif; ?>">
                                            <div class="md-step-circle"><span> <?php if ($invite_title->count_14  == 0): ?> 0 <?php else: echo $invite_title->count_14; endif; ?></span></div>
                                            <div class="md-step-optional"> {{ $invite_title->title_14 }} </div>
                                            <div class="md-step-bar-left"></div>
                                            <div class="md-step-bar-right"></div>
                                            </div> <br>
                                        <?php endif; ?>

                                        <?php if ($invite_title->title_15):?>
                                            <div class="md-step <?php if ($invite_title->count_15 == 0): ?> <?php else: ?> active <?php endif; ?>">
                                            <div class="md-step-circle"><span> <?php if ($invite_title->count_15  == 0): ?> 0 <?php else: echo $invite_title->count_15; endif; ?></span></div>
                                            <div class="md-step-optional"> {{ $invite_title->title_15 }} </div>
                                            <div class="md-step-bar-left"></div>
                                            <div class="md-step-bar-right"></div>
                                            </div> 
                                        <?php endif; ?>

                                        <?php if ($invite_title->title_16):?>
                                            <div class="md-step <?php if ($invite_title->count_16 == 0): ?> <?php else: ?> active <?php endif; ?>">
                                            <div class="md-step-circle"><span> <?php if ($invite_title->count_16  == 0): ?> 0 <?php else: echo $invite_title->count_16; endif; ?></span></div>
                                            <div class="md-step-optional"> {{ $invite_title->title_16 }} </div>
                                            <div class="md-step-bar-left"></div>
                                            <div class="md-step-bar-right"></div>
                                            </div> 
                                        <?php endif; ?>
                                        <?php if ($invite_title->title_17):?>
                                            <div class="md-step <?php if ($invite_title->count_17== 0): ?> <?php else: ?> active <?php endif; ?>">
                                            <div class="md-step-circle"><span> <?php if ($invite_title->count_17  == 0): ?> 0 <?php else: echo $invite_title->count_17; endif; ?></span></div>
                                            <div class="md-step-optional"> {{ $invite_title->title_17 }} </div>
                                            <div class="md-step-bar-left"></div>
                                            <div class="md-step-bar-right"></div>
                                            </div> <br>
                                        <?php endif; ?>
                                        <?php if ($invite_title->title_18):?>
                                            <div class="md-step <?php if ($invite_title->count_18== 0): ?> <?php else: ?> active <?php endif; ?>">
                                            <div class="md-step-circle"><span> <?php if ($invite_title->count_18  == 0): ?> 0 <?php else: echo $invite_title->count_18; endif; ?></span></div>
                                            <div class="md-step-optional"> {{ $invite_title->title_18 }} </div>
                                            <div class="md-step-bar-left"></div>
                                            <div class="md-step-bar-right"></div>
                                            </div> 
                                        <?php endif; ?>
                                        <?php if ($invite_title->title_19):?>
                                            <div class="md-step <?php if ($invite_title->count_19 == 0): ?> <?php else: ?> active <?php endif; ?>">
                                            <div class="md-step-circle"><span> <?php if ($invite_title->count_19  == 0): ?> 0 <?php else: echo $invite_title->count_19; endif; ?></span></div>
                                            <div class="md-step-optional"> {{ $invite_title->title_19 }} </div>
                                            <div class="md-step-bar-left"></div>
                                            <div class="md-step-bar-right"></div>
                                            </div>
                                        <?php endif; ?>
                                        <?php if ($invite_title->title_20):?>
                                            <div class="md-step <?php if ($invite_title->count_20== 0): ?> <?php else: ?> active <?php endif; ?>">
                                            <div class="md-step-circle"><span> <?php if ($invite_title->count_20  == 0): ?> 0 <?php else: echo $invite_title->count_20; endif; ?></span></div>
                                            <div class="md-step-optional"> {{ $invite_title->title_20 }} </div>
                                            <div class="md-step-bar-left"></div>
                                            <div class="md-step-bar-right"></div>
                                            </div> <br>
                                        <?php endif; ?>

                                       

                                        <!--
                                        <div class="md-step 
                                            <?php //if ($invite_title->count_1 > 1) { echo 'active';} ?> ">
                                            <div class="md-step-circle"><span> </span></div>
                                            <div class="md-step-optional"> Complete </div>
                                            <div class="md-step-bar-left"></div>
                                            <div class="md-step-bar-right"></div>
                                        </div> -->
                                     
                                    @endforeach
                                </div>


                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

@endsection


 
 @section('scripts')

    <script type="text/javascript">
        


        $('#master').on('click', function(e) {
         if($(this).is(':checked',true))  
         {
            $(".sub_chk").prop('checked', true);  
         } else {  
            $(".sub_chk").prop('checked',false);  
         }  
        });


        $('.delete_all').on('click', function(e) {


            var allVals = [];  
            $(".sub_chk:checked").each(function() {  
                allVals.push($(this).attr('data-id'));
            });  


            if(allVals.length <=0)  
            {  
                alert("Please select row.");  
            }  else {  


                var check = confirm("Are you sure you want to delete this row?");  
                if(check == true){  


                    var join_selected_values = allVals.join(","); 


                    $.ajax({
                        url: $(this).data('url'),
                        type: 'DELETE',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: 'ids='+join_selected_values,
                        success: function (data) {
                            if (data['success']) {
                                $(".sub_chk:checked").each(function() {  
                                    $(this).parents("tr").remove();
                                });
                                alert(data['success']);
                            } else if (data['error']) {
                                alert(data['error']);
                            } else {
                                alert('Whoops Something went wrong!!');
                            }
                        },
                        error: function (data) {
                            alert(data.responseText);
                        }
                    });


                  $.each(allVals, function( index, value ) {
                      $('table tr').filter("[data-row-id='" + value + "']").remove();
                  });
                }  
            }  
        });


        $('[data-toggle=confirmation]').confirmation({
            rootSelector: '[data-toggle=confirmation]',
            onConfirm: function (event, element) {
                element.trigger('confirm');
            }
        });


        $(document).on('confirm', function (e) {
            var ele = e.target;
            e.preventDefault();


            $.ajax({
                url: ele.href,
                type: 'DELETE',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function (data) {
                    if (data['success']) {
                        $("#" + data['tr']).slideUp("slow");
                        alert(data['success']);
                    } else if (data['error']) {
                        alert(data['error']);
                    } else {
                        alert('Whoops Something went wrong!!');
                    }
                },
                error: function (data) {
                    alert(data.responseText);
                }
            });


            return false;
        });
    });
</script>

@endsection



<style>

     @media screen and (min-width: 320px) {

    html {
    -webkit-font-smoothing: antialiased!important;
    -moz-osx-font-smoothing: grayscale!important;
    -ms-font-smoothing: antialiased!important;
    }

    body {
      font-family: 'Open Sans', sans-serif;
      font-size:16px;
      color:#555555; 
    }
    .md-stepper-horizontal {
        /** width:100%;
        margin:0 auto;
        background-color:#FFFFFF; **/
    }
    .md-stepper-horizontal .md-step {
        display:table-cell;
        position:relative;
        padding:5px;
    }
    .md-stepper-horizontal .md-step:hover,
    .md-stepper-horizontal .md-step:active {
        background-color:rgba(0,0,0,0.04);
    }
    .md-stepper-horizontal .md-step:active {
        border-radius: 15% / 75%;
    }
    .md-stepper-horizontal .md-step:first-child:active {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }
    .md-stepper-horizontal .md-step:last-child:active {
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
    }
    .md-stepper-horizontal .md-step:hover .md-step-circle {
        background-color:#757575;
    }
    .md-stepper-horizontal .md-step:first-child .md-step-bar-left,
    .md-stepper-horizontal .md-step:last-child .md-step-bar-right {
        display:none;
    }
    .md-stepper-horizontal .md-step .md-step-circle {
        width:35px;
        height:35px;
        margin:0 auto;
        background-color:#999999;
        border-radius: 50%;
        text-align: center;
        line-height:30px;
        font-size: 13px;
        font-weight: 600;
        color:#FFFFFF;
        padding-top: 3px;
    }
    .md-stepper-horizontal.green .md-step.active .md-step-circle {
        background-color:#00AE4D;
    }
    .md-stepper-horizontal.orange .md-step.active .md-step-circle {
        background-color:#2792ca;
    }
    .md-stepper-horizontal .md-step.active .md-step-circle {
        background-color: rgb(33,150,243);
    }
    .md-stepper-horizontal .md-step.done .md-step-circle:before {
        font-family:'FontAwesome';
        font-weight:100;
        content: "\f00c";
    }
    .md-stepper-horizontal .md-step.done .md-step-circle *,
    .md-stepper-horizontal .md-step.editable .md-step-circle * {
        display:none;
    }
    .md-stepper-horizontal .md-step.editable .md-step-circle {
        -moz-transform: scaleX(-1);
        -o-transform: scaleX(-1);
        -webkit-transform: scaleX(-1);
        transform: scaleX(-1);
    }
    .md-stepper-horizontal .md-step.editable .md-step-circle:before {
        font-family:'FontAwesome';
        font-weight:100;
        content: "\f040";
    }
    .md-stepper-horizontal .md-step .md-step-title {
        margin-top:16px;
        font-size:16px;
        font-weight:600;
    }
    .md-stepper-horizontal .md-step .md-step-title,
    .md-stepper-horizontal .md-step .md-step-optional {
        text-align: center;
        color:rgba(0,0,0,.26);
    }
    .md-stepper-horizontal .md-step.active .md-step-title {
        font-weight: 600;
        color:rgba(0,0,0,.87);
    }
    .md-stepper-horizontal .md-step.active.done .md-step-title,
    .md-stepper-horizontal .md-step.active.editable .md-step-title {
        font-weight:600;
    }
    .md-stepper-horizontal .md-step .md-step-optional {
        font-size:12px;
        padding-top: 10px;
        width: 175px;
    }
    .md-stepper-horizontal .md-step.active .md-step-optional {
        color:rgba(0,0,0,.54);
    }
    .md-stepper-horizontal .md-step .md-step-bar-left,
    .md-stepper-horizontal .md-step .md-step-bar-right {
        position:absolute;
        top:20px;
        height:1px;
        border-top:3px solid #2792ca;
    }
    .md-stepper-horizontal .md-step .md-step-bar-right {
        right:0;
        left:50%;
        margin-left:30px;
    }
    .md-stepper-horizontal .md-step .md-step-bar-left {
        left:0;
        right:50%;
        margin-right:30px;
    }


    .progress-bar2{
        float: right;
        width: 96px;
        background-color: #337ab7;
        color: #337ab7;
        margin-top: 10px;
        height: 10px;
        font-size: 1px;
        z-index: 9999 !important;
        position: absolute;
        margin-left: 50px;
        border-radius: 15px; 
    }

    .smpl-step {
        margin-top: 20px;
    }
    .smpl-step {
        border-bottom: solid 1px #e0e0e0;
        padding: 0 0 10px 0;
    }

    .smpl-step > .smpl-step-step {
        padding: 0;
        position: relative;
    }   

    .smpl-step > .smpl-step-step .smpl-step-num {
        font-size: 12px;
        margin-top: -20px;
        margin-left: 47px;
    }

    .smpl-step > .smpl-step-step .smpl-step-info {
        font-size: 12px;
        padding-top: 35px;
    }

    .smpl-step > .smpl-step-step > .smpl-step-icon {
        position: absolute;
        width: 44px;
        height: 42px;
        display: block;
        background: #5CB85C;
        top: 35px;
        left: 50%;
        margin-top: -35px;
        margin-left: -15px;
        border-radius: 50%;
    }

    .smpl-step > .smpl-step-step > .progress {
        position: relative;
        border-radius: 0px;
        height: 8px;
        box-shadow: none;
        margin-top: 37px;
    }

   .smpl-step > .smpl-step-step > .progress > .progress-bar {
       width: 0px;
       box-shadow: none;
       background: #428BCA;
   }

    .smpl-step > .smpl-step-step.complete > .progress > .progress-bar {
        width: 100%;
    }

    .smpl-step > .smpl-step-step.active > .progress > .progress-bar {
        width: 50%;
    }

    .smpl-step > .smpl-step-step:first-child.active > .progress > .progress-bar {
        width: 0%;
    }

    .smpl-step > .smpl-step-step:last-child.active > .progress > .progress-bar {
        width: 100%;
    }

    .smpl-step > .smpl-step-step.disabled > .smpl-step-icon {
        background-color: #f5f5f5;
    }

    .smpl-step > .smpl-step-step.disabled > .smpl-step-icon:after {
        opacity: 0;
    }

    .smpl-step > .smpl-step-step:first-child > .progress {
        left: 50%;
        width: 50%;
    }

    .smpl-step > .smpl-step-step:last-child > .progress {
        width: 50%;
    }

    .smpl-step > .smpl-step-step.disabled a.smpl-step-icon {
        pointer-events: none;
    }

    .col-xs-3 {
        width: 18% !important;
    }

    body.dashboard .placeholders {
         margin-bottom: 1px !important; 
         text-align: center; 
    }

   }


    @media screen and (min-width: 992px) {


        html {
    -webkit-font-smoothing: antialiased!important;
    -moz-osx-font-smoothing: grayscale!important;
    -ms-font-smoothing: antialiased!important;
    }

    body {
      font-family: 'Open Sans', sans-serif;
      font-size:16px;
      color:#555555; 
    }
    .md-stepper-horizontal {
        /** width:100%;
        margin:0 auto;
        background-color:#FFFFFF; **/
    }
    .md-stepper-horizontal .md-step {
        display:table-cell;
        position:relative;
        padding:5px;
    }
    .md-stepper-horizontal .md-step:hover,
    .md-stepper-horizontal .md-step:active {
        background-color:rgba(0,0,0,0.04);
    }
    .md-stepper-horizontal .md-step:active {
        border-radius: 15% / 75%;
    }
    .md-stepper-horizontal .md-step:first-child:active {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }
    .md-stepper-horizontal .md-step:last-child:active {
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
    }
    .md-stepper-horizontal .md-step:hover .md-step-circle {
        background-color:#757575;
    }
    .md-stepper-horizontal .md-step:first-child .md-step-bar-left,
    .md-stepper-horizontal .md-step:last-child .md-step-bar-right {
        display:none;
    }
    .md-stepper-horizontal .md-step .md-step-circle {
        width:35px;
        height:35px;
        margin:0 auto;
        background-color:#999999;
        border-radius: 50%;
        text-align: center;
        line-height:30px;
        font-size: 13px;
        font-weight: 600;
        color:#FFFFFF;
        padding-top: 3px;
    }
    .md-stepper-horizontal.green .md-step.active .md-step-circle {
        background-color:#00AE4D;
    }
    .md-stepper-horizontal.orange .md-step.active .md-step-circle {
        background-color:#2792ca;
    }
    .md-stepper-horizontal .md-step.active .md-step-circle {
        background-color: rgb(33,150,243);
    }
    .md-stepper-horizontal .md-step.done .md-step-circle:before {
        font-family:'FontAwesome';
        font-weight:100;
        content: "\f00c";
    }
    .md-stepper-horizontal .md-step.done .md-step-circle *,
    .md-stepper-horizontal .md-step.editable .md-step-circle * {
        display:none;
    }
    .md-stepper-horizontal .md-step.editable .md-step-circle {
        -moz-transform: scaleX(-1);
        -o-transform: scaleX(-1);
        -webkit-transform: scaleX(-1);
        transform: scaleX(-1);
    }
    .md-stepper-horizontal .md-step.editable .md-step-circle:before {
        font-family:'FontAwesome';
        font-weight:100;
        content: "\f040";
    }
    .md-stepper-horizontal .md-step .md-step-title {
        margin-top:16px;
        font-size:16px;
        font-weight:600;
    }
    .md-stepper-horizontal .md-step .md-step-title,
    .md-stepper-horizontal .md-step .md-step-optional {
        text-align: center;
        color:rgba(0,0,0,.26);
    }
    .md-stepper-horizontal .md-step.active .md-step-title {
        font-weight: 600;
        color:rgba(0,0,0,.87);
    }
    .md-stepper-horizontal .md-step.active.done .md-step-title,
    .md-stepper-horizontal .md-step.active.editable .md-step-title {
        font-weight:600;
    }
    .md-stepper-horizontal .md-step .md-step-optional {
        font-size:12px;
        padding-top: 10px;
        width: 175px;
    }
    .md-stepper-horizontal .md-step.active .md-step-optional {
        color:rgba(0,0,0,.54);
    }
    .md-stepper-horizontal .md-step .md-step-bar-left,
    .md-stepper-horizontal .md-step .md-step-bar-right {
        position:absolute;
        top:20px;
        height:1px;
        border-top:3px solid #2792ca;
    }
    .md-stepper-horizontal .md-step .md-step-bar-right {
        right:0;
        left:50%;
        margin-left:30px;
    }
    .md-stepper-horizontal .md-step .md-step-bar-left {
        left:0;
        right:50%;
        margin-right:30px;
    }


    .progress-bar2{
        float: right;
        width: 96px;
        background-color: #337ab7;
        color: #337ab7;
        margin-top: 10px;
        height: 10px;
        font-size: 1px;
        z-index: 9999 !important;
        position: absolute;
        margin-left: 50px;
        border-radius: 15px; 
    }

    .smpl-step {
        margin-top: 20px;
    }
    .smpl-step {
        border-bottom: solid 1px #e0e0e0;
        padding: 0 0 10px 0;
    }

    .smpl-step > .smpl-step-step {
        padding: 0;
        position: relative;
    }   

    .smpl-step > .smpl-step-step .smpl-step-num {
        font-size: 12px;
        margin-top: -20px;
        margin-left: 47px;
    }

    .smpl-step > .smpl-step-step .smpl-step-info {
        font-size: 12px;
        padding-top: 35px;
    }

    .smpl-step > .smpl-step-step > .smpl-step-icon {
        position: absolute;
        width: 44px;
        height: 42px;
        display: block;
        background: #5CB85C;
        top: 35px;
        left: 50%;
        margin-top: -35px;
        margin-left: -15px;
        border-radius: 50%;
    }

    .smpl-step > .smpl-step-step > .progress {
        position: relative;
        border-radius: 0px;
        height: 8px;
        box-shadow: none;
        margin-top: 37px;
    }

   .smpl-step > .smpl-step-step > .progress > .progress-bar {
       width: 0px;
       box-shadow: none;
       background: #428BCA;
   }

    .smpl-step > .smpl-step-step.complete > .progress > .progress-bar {
        width: 100%;
    }

    .smpl-step > .smpl-step-step.active > .progress > .progress-bar {
        width: 50%;
    }

    .smpl-step > .smpl-step-step:first-child.active > .progress > .progress-bar {
        width: 0%;
    }

    .smpl-step > .smpl-step-step:last-child.active > .progress > .progress-bar {
        width: 100%;
    }

    .smpl-step > .smpl-step-step.disabled > .smpl-step-icon {
        background-color: #f5f5f5;
    }

    .smpl-step > .smpl-step-step.disabled > .smpl-step-icon:after {
        opacity: 0;
    }

    .smpl-step > .smpl-step-step:first-child > .progress {
        left: 50%;
        width: 50%;
    }

    .smpl-step > .smpl-step-step:last-child > .progress {
        width: 50%;
    }

    .smpl-step > .smpl-step-step.disabled a.smpl-step-icon {
        pointer-events: none;
    }

    .col-xs-3 {
        width: 18% !important;
    }

    body.dashboard .placeholders {
         margin-bottom: 1px !important; 
         text-align: center; 
    }


        }
</style>




