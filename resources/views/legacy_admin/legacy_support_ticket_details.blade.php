@extends('layouts.legacy_dashboard')

@section('content')
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Ticket Details</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-4">
                    <h5><strong>Subject</strong></h5>
                    <p>{{ $ticket->subject  }}</p>
                    <h5><strong>Description</strong></h5>
                    <p>{{ $ticket->description }}</p>
                    <h5><strong>Created By</strong></h5>
                    <p>{{ $ticket->user->fullname }}</p>
                </div>
                <div class="col-md-4">
                    <h5><strong>Created On</strong></h5>
                    <p>{{ $ticket->created_at->format('y/m/d h:i:s a') }}</p>
                    <h5><strong>Status</strong></h5>
                    <p>{{ $ticket->status->description }}</p>
                </div>
                <div class="col-md-4">
                    @if ($ticket->status->name == 'open')
                        <button class="btn btn-danger btn-close pull-right" data-id="{{ $ticket->id }}">Close Ticket</button>
                    @else
                        <button class="btn btn-primary btn-reopen pull-right" data-id="{{ $ticket->id }}">Re-Open Ticket</button>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Comments</h3>
            <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">Add New Comment</a>
        </div>
        <div class="panel-body comment-section">

            <div class="col-md-12">
                @foreach($comments as $comment)
                    <div class="row">
                        <div class="col-md-8 @if($comment->user_id == $ticket->user_id) col-md-offset-4 @endif">
                            <p class="meta">Added By: {{ $comment->user->full_name }} <span class="pull-right">{{ $comment->created_at->format('m-d-Y h:i A') }}</span></p>
                            <p class="comment">{!! $comment->comment !!}</p>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add New Comment</h4>
                </div>
                <form action="" id="comment_form">
                    <input type="hidden" name="support_ticket_id" value="{{ $ticket->id }}">
                    <div class="modal-body">
                            <label for="comment">Comment</label>
                            <textarea name="comment" id="comment" class="form-control" style="min-width: 100%" cols="10" rows="10" required></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

@section('scripts')
    <script>
        $(function () {
            $('.btn-close').on('click', function () {
                var $elem = $(this);
                var ticketId = $elem.data('id');
                swal({
                    title: 'Are you sure?',
                    text: "You are about to close this ticket.",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, close it!'
                }).then(function (result) {

                    if (result.value) {
                        $.ajax({
                            type: 'POST',
                            dataType: 'json',
                            data: {
                                _method: 'PUT',
                                closed_date: 1
                            },
                            headers: getAjaxHeaders(),
                            url: '/legacy_admin/support_tickets/' + ticketId,
                            success: function (xhr) {
                                swal(
                                    'Closed!',
                                    'Ticket Closed.',
                                    'success'
                                ).then(function () {
                                    location.reload()
                                });
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
            });

            $('.btn-reopen').on('click', function () {
                var $elem = $(this);
                var ticketId = $elem.data('id');
                swal({
                    title: 'Are you sure?',
                    text: "You are about to re-open this ticket.",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, re-open it!'
                }).then(function (result) {

                    if (result.value) {
                        $.ajax({
                            type: 'POST',
                            dataType: 'json',
                            data: {
                                _method: 'PUT',
                                reopen: 1
                            },
                            headers: getAjaxHeaders(),
                            url: '/legacy_admin/support_tickets/' + ticketId,
                            success: function (xhr) {
                                swal(
                                    'Re-opened!',
                                    'Ticket Re-opened.',
                                    'success'
                                ).then(function () {
                                    location.reload()
                                });
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
            });

            $('#comment_form').on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    data: $(this).serializeArray(),
                    headers: getAjaxHeaders(),
                    url: '/distributor/support/ticket_comments',
                    success: function (xhr) {
                        swal(
                            'Successful!',
                            'Comment Added.',
                            'success'
                        ).then(function () {
                            location.reload()
                        });
                    },
                    error: function (data) {
                        swal(
                            'Oops!',
                            'Something went wrong.',
                            'error'
                        );
                    }
                });
            });
        });
    </script>
@endsection
