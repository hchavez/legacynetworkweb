@extends('layouts.distributor_dashboard')

@section('content')
    <div class="inner-content-wrapper">
        <h2>Preferences</h2>

        <form id="notification_pref_form">
            <label class="radio-inline">
                <input type="radio" name="optradio" value="1" checked>I want to keep receiving notification messages
            </label>
            <label class="radio-inline">
                <input type="radio" name="optradio" value="0">I don't want to receive notification messages
            </label>
        </form>
    </div>

    <div class="inner-content-wrapper">
        <h2>Notifications</h2>


  <button style="margin-bottom: 10px" class="btn btn-primary delete_all" data-url="{{ url('distributor/settings/notification_delete_all') }}">Delete All Selected</button>
    <table class="table table-bordered">
         <tr>
          <td style="width: 1px !important; padding: 1px !important; text-align: center !important;"><input type="checkbox" id="master"></td>
            <td width="100px"> Messages</td>
        </tr>
       
            @foreach($deleted_messages as $notification)
                   
                <tr id="tr_{{$notification->id}}"> <td> <input type="checkbox" class="sub_chk" data-id="{{$notification->id}}"></td>
                
                     <td> 
                   <div class="callout callout-info callout-sm">
                <p>{!! $notification->message !!} <i class="pull-right">{{ \Illuminate\Support\Carbon::parse($notification->deleted_at)->format('m-d-Y h:i:s a') }}</i></p>
            </div></td>
                
                </tr>
            @endforeach
       
    </table>

    </div>


    <div class="container">
    <h2>Notifications</h2>
  
</div> <!-- container / end -->


@endsection

@section('scripts')
    @if(!$in_training)
        <script type="text/javascript">
            $('#notification_pref_form').on('click', 'input', function() {
                $.ajax({
                    url: '/users/' + '{{ Auth::user()->id }}',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        _method: 'PUT',
                        is_subscribed: $(this).val()
                    },
                    headers: getAjaxHeaders(),
                    success: function () {
                        swal(
                            'Preferences Updated!',
                            'success'
                        );
                    },
                    error: function () {
                        swal(
                            'Oops!',
                            'Something went wrong.',
                            'error'
                        );
                    }
                });
            })
        </script>
    @endif

    <script type="text/javascript">
    $(document).ready(function () {


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