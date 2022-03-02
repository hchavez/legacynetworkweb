@extends('layouts.legacy_dashboard')

@section('content')
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">User Mail Achievement</h3>
            <input type="hidden" id="statusName">
            <input type="hidden" id="trainingStatusName">
            <input type="hidden" id="isCustomer">
          
           @if ($message = Session::get('success'))
                             <div class="alert alert-success alert-block">
                              <button type="button" class="close" data-dismiss="alert">×</button>
                                     <strong>{{ $message }}</strong>
                             </div>
                             @endif
                             
        </div>
        <div class="panel-body">
        
            <table id="users_table" class="table table-hover table-responsive display" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th></th>
                    <th>ID</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Email</th>
                    <th>Achievement Level</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(function () {
            var table = $('#users_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ url('legacy_admin/dt/mail_achievement') }}',
                    data: function(d) {
                        d.status = $('input#statusName').val();
                        d.is_training_done = $('input#trainingStatusName').val();
                        d.is_customer = $('input#isCustomer').val();
                    }
                },
                columns: [
                    {
                        "className": 'details-control',
                        "orderable": false,
                        "searchable": false,
                        "data": "id",
                        "defaultContent": '',
                        "render": function () {
                            return '<i class="fa fa-plus-square" aria-hidden="true"></i>';
                        },
                        width:"15px"
                    },
                    {data: "id", searchable: false},
                    {data: "first_name", searchable: false},
                    {data: "last_name", searchable: false},
                    {data: "email", searchable: false},
                    {data: "achievement_level", searchable: false}
                ]
            });

            $('#users_table tbody')
                .on('click', 'td.details-control', function () {
                    var tr = $(this).closest('tr');
                    var tdi = tr.find("i.fa");
                    var row = table.row(tr);

                    if (row.child.isShown()) {
                        // This row is already open - close it
                        row.child.hide();
                        tr.removeClass('shown');
                        tdi.first().removeClass('fa-minus-square');
                        tdi.first().addClass('fa-plus-square');
                    }
                    else {
                        // Open this row
                        row.child(format(row.data())).show();
                        tr.addClass('shown');
                        tdi.first().removeClass('fa-plus-square');
                        tdi.first().addClass('fa-minus-square');
                    }
                })
                .on('dblclick', 'tr', function (e) {
//                    var data = table.row(this).data();
                    $(this).find('td.details-control').trigger('click');
                })
                .on('click', '.btn-delete', function () {
                    var $elem = $(this);
                    var distributorId = $elem.data('id');
                    swal({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then(function (result) {

                        if (result.value) {
                            $.ajax({
                                type: 'POST',
                                dataType: 'json',
                                data: {
                                    _method: 'DELETE'
                                },
                                headers: getAjaxHeaders(),
                                url: '/legacy_admin/legacy/distributors/' + distributorId,
                                success: function (xhr) {
                                    swal(
                                        'Deleted!',
                                        'Deleted.',
                                        'success'
                                    );

                                    table.draw();
                                },
                                error: function (data) {
                                    swal(
                                        'Oops!',
                                        'Something went wrong.',
                                        'error'
                                    );
                                }
                            });

                        }
                    })
                })
            ;

            $('.dataTableFilterButtons').on('click', 'a', function (e) {
                e.preventDefault();
                var $elem = $(this);
                var fTarget = $elem.data('ftarget');

                if (fTarget === 'reset') {
                    $('input#statusName').val(null);
                    $('input#trainingStatusName').val(null);
                    $('input#isCustomer').val(0);
                } else if (fTarget === 'statusName') {
                    $('input#statusName').val($elem.data('value'));
                    $('input#trainingStatusName').val(null);
                    $('input#isCustomer').val(0);       
                } else if (fTarget === 'trainingStatusName') {
                    $('input#trainingStatusName').val($elem.data('value'));
                    $('input#statusName').val(null);
                    $('input#isCustomer').val(0);
                } else if (fTarget === 'isCustomer') {
                    $('input#isCustomer').val(1);
                    $('input#statusName').val(null);
                    $('input#trainingStatusName').val(null);
                }

                $('.dataTableFilterButtons a').removeClass('btn-xs btn-warning');
                $elem.addClass('btn-xs btn-warning');

                table.draw();
            });
        });

        function format ( d ) {
            // `d` is the original data object for the row
            var url = '{{ url('legacy_admin/legacy/mail_achievement/') }}' + '/';
            return '<table class="table">' +
              
                        '<tr>' + 
                            '<td><strong>Synergy ID</strong></td>' +
                            '<td>' + d.synergy_id + '</td>' +
                        '</tr>' + 
                        '<tr>' + 
                            '<td><strong>Actions</strong></td>' +
                            '<td>' +
                                '<a href="{{ url('legacy_admin/legacy/mail_achievement/') }}' + '/' + d.id + '/edit' + '" class="btn btn-sm btn-primary">Mail Achievement Now!</a> ' +
                                '<a href="mailto:'+ d.email +'" target="_blank"class="btn btn-sm btn-warning">Send Message</a> ' +
                            '</td>' +
                        '</tr>' + 
                    '</table>';
        }

    </script>
@endsection
