@extends('layouts.distributor_dashboard')

@section('content')
    <div class="inner-content-wrapper">
        <div class="row">
            <div class="col-md-8">
                <div class="comments">
                    @if($ticket_comments->count())
                        @foreach($ticket_comments as $comment)
                            <div class="callout @if($comment->user_id == $ticket->user_id) callout-info @else callout-warning @endif">
                                <span class="pull-left comment_by">Added by: {{ $comment->user->full_name }}</span>

                                <span class="pull-right comment_date">Added on: {{ $comment->created_at->format('m/d/Y h:i A') }}</span>
                                <br/>
                                <p class="comment_text">{{ $comment->comment }}</p>
                            </div>
                        @endforeach
                    @else
                        <div class="alert alert-warning">No comments available</div>
                    @endif
                </div>
            </div>
            <div class="col-md-4">
                <h4>{{ $ticket->subject }}</h4>
                <p>Submitted on: {{ $ticket->created_at->format('m/d/Y h:i A') }}</p>
                <blockquote>{{ $ticket->description }}</blockquote>
                <div class="comment-editor">
                    <form id="comment-form">
                        <div class="form-group">
                            <input type="hidden" name="support_ticket_id" value="{{ $ticket->id }}"/>
                            <label for="comment">Add Comment</label>
                            <textarea name="comment" id="comment" class="form-control" rows="5" required="required"></textarea>
                        </div>
                        <div class="form-group text-right">
                            <a href="{{ url('distributor/support/open_ticket') }}" class="btn btn-default">Back</a>
                            <button type="submit" class="btn btn-primary">Post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @if(!$in_training)
        <script type="text/javascript">
        $('#comment-form').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: '../ticket_comments',
                method: "POST",
                data: $(this).serialize(),
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
