@extends('layouts.legacy_dashboard')

@section('content')
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">LN Merchandise Orders</h3>
         
             <input type="hidden" id="status">
                <p class="panel-subtitle dataTableFilterButtons">
                    <a href="#" data-ftarget="reset" class="btn-xs btn-warning" data-value=""><strong>All</strong></a> |
                    <a href="#" data-ftarget="status" data-value="active"><strong>Active</strong></a>
                    |
                    <a href="#" data-ftarget="status" data-value="inactive"><strong>Inactive</strong></a>
                </p>
        </div>
        <div class="panel-body">
            <p><a href="{{ url('legacy_admin/legacy/merchandise/create') }}" class="btn btn-primary"> Create   </a></p>
            <table id="bc_table" class="table table-hover table-responsive display" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th></th>
                    <th>Product Name</th>
                    <th>Product Description</th>
                    <th>Size</th>
                    <th>Color</th>
                    <th>Price</th>
                    <th>Stock</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(function () {
            var table = $('#bc_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ url('legacy_admin/dt/merchandise') }}',
                    data: function(d) {
                        d.status = $('input#status').val();
                    }
                },
                columns: [
                    {
                        "className": 'details-control',
                        "orderable": false,
                        "data": "id",
                        "defaultContent": '',
                        "render": function () {
                            return '<i class="fa fa-plus-square" aria-hidden="true"></i>';
                        },
                        width:"15px"
                    },
                   // {data: "id"},
                    {data: "product_name"},
                    {data: "product_description"},
                    {data: "size"},
                    {data: "color"},
                    {data: "price"},
                    {data: "stock"},
                    // {data: "image"},
                    /**{data: "size"},
                    {data: "color"},
                    {data: "style"},
                    {data: "stock"},
                    {data: "status"},
                    {data: "created_at", render: function(d){
                        return moment(d).format("MMM D YYYY")
                    }}, **/
                ]
            });

            $('#bc_table tbody')
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
                    $(this).find('td.details-control').trigger('click');
                })
                .on('click', '.btn-delete', function () {
                    var $elem = $(this);
                    var recordId = $elem.data('id');
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
                                url: '/legacy_admin/legacy/merchandise/' + recordId,
                                success: function () {
                                    swal(
                                        'Deleted!',
                                        'Deleted.',
                                        'success'
                                    );

                                    table.draw();
                                },
                                error: function () {
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
                    $('input#status').val(null);
                } else if (fTarget === 'status') {
                    $('input#status').val($elem.data('value'));
                }

                $('.dataTableFilterButtons a').removeClass('btn-xs btn-warning');
                $elem.addClass('btn-xs btn-warning');

                table.draw();
            });

        });

        function format ( d ) {
            // `d` is the original data object for the row
            return  '<table class="table">' +
                        '<tr>' +
                            '<td><strong>Actions</strong></td>' +
                            '<td>' +
                                '<a href="{{ url('legacy_admin/legacy/merchandise/') }}' + '/' + d.id + '/edit' + '" class="btn btn-sm btn-primary">Edit</a> ' +
                                '<a class="btn btn-sm btn-danger btn-delete" data-id="' + d.id + '">Delete</button> ' +
                            '</td>' +
                        '</tr>' +
                    '</table>';
        }

    </script>
@endsection