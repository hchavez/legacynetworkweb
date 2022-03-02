@extends('layouts.distributor_dashboard')

@section('content')
    <div class="inner-content-wrapper">
        <h2>Open Support Ticket</h2>
        <form id="formUploadFile" method="POST" action="/distributor/support/upload" role="form" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <input class="form-control" name="subject" placeholder="Type your subject" required="required">
            </div>
            <div class="form-group">
                <textarea required="required" class="form-control" name="description" rows="10" placeholder="Describe the issue"></textarea>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="category_id">Ticket Category</label>
                        <select class="form-control" name="category_id" id="category_id" required>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Attachment Image</label>
                        <input type="file" name="file">
                        <small>Max Attachment size: <strong>2MB</strong></small>
                    </div>
                </div>
                <div class="col-md-4 text-right">
                    <div>
                        <button type="reset" id="reset-form" class="btn btn-danger btn-lg">Reset Form</button>
                        <button type="submit" class="btn btn-primary btn-lg">Send Ticket</button>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="alert alert-warning alert-xs">
                        <p><strong>If it is a business question or a product question please contact Synergy Worldwide.</strong></p>
                    </div>
                    <div class="alert alert-warning alert-xs">
                        <p>If you want to upload multiple image files, please put in a archive/zip file. And if the
                            attachment file size too big, you can upload it on a any file hosting and include the
                            link of the file on the description above.</p>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="inner-content-wrapper">
        <h2>My Support Tickets</h2>

        <table class="table">
            <thead>
            <tr>
                <th>Ticket#</th>
                <th>Status</th>
                <th>Subject</th>
                <th>Comments</th>
                <th>Submitted</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($user_tickets as $ticket)
                <tr>
                    <td>#{{ $ticket->id }}</td>
                    <td><span class="label @if($ticket->status->name == 'open') label-primary @else label-danger @endif">{{ $ticket->status->description }}</span></td>
                    <td>
                        <a href="{{ url('distributor/support/tickets/' . $ticket->id) }}">{{ $ticket->subject }}</a>
                    </td>
                    <td>0</td>
                    <td>{{ $ticket->created_at->format('m/d/Y h:i:s')}}</td>
                    <td>
                        @if ($ticket->closedBy)
                            <p>Closed on: <strong>{{ $ticket->closed_date->format('m/d/Y h:i:s a')}}</strong></p>
                            <p>By: <strong>{{ $ticket->closedBy->full_name }}</strong></p>
                        @else
                            <a href="#" class="btn btn-danger btn-xs close-ticket" data-id="{{ $ticket->id }}">Close</a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('scripts')
    @if(!$in_training)
        <script type="application/javascript" src="{{ url('/') }}/vendor/jquery.form/jquery.form.js"></script>
        <script>
            $(document).ready(function () {
                $('#formUploadFile').ajaxForm({
                    success: function () {
                        swal({
                            title: 'Ticket Created',
                            text: "Click on the ticket list to show details for each ticket.",
                            type: 'success'
                        }).then(function () {
                            location.reload();
                        });
                    },
                    complete: function (xhr) {

                    },
                    error: function(xhr) {
                        alert('Make sure All Fields are filled up and file is up to 2MB only');
                    }
                });
            })
                $('#success-message').hide();


                $('.close-ticket').on('click', function () {
                    $elem = $(this);

                    $.ajax({
                        url: 'tickets/' + $elem.data('id'),
                        method: "POST",
                        data: {
                            closed_date: 1,
                            closed_by_id: '{{ Auth::user()->id }}',
                            _method: "PUT"
                        },
                        dataType: 'json',
                        headers: getAjaxHeaders(),
                        success: function(response) {
                            location.reload()
                        }
                    });
                });

        </script>
    @endif
@endsection
