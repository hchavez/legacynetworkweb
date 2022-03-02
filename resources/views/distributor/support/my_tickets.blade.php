@extends('layouts.distributor_dashboard')

@section('content')
    <div class="inner-content-wrapper">
        <div class="callout callout-info">
            <h3>Support Tickets</h3>
            <p>Did you encounter some problem or issues while using Legacy Network Website or Dashboard? Click the
                button below to open a support ticket and will get to you as soon as possible.</p>
            <p><a href="{{ url('distributor/support/open_ticket') }}" class="btn btn-danger"><i class="fa fa-ticket"></i> Open Support Ticket</a></p>
        </div>
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
        <script type="text/javascript">
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
