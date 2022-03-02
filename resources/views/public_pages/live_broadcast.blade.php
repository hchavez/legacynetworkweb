@extends('layouts.frontend')
@section('page-title', 'Live Broadcast| Legacy Network')
@section('styles')
    <style>
        .text-red {
            color: red
        }
    </style>
@endsection
@section('content')
    <section class="main-content container broadcast-container">
        <div class='embed-container'>
            {!!  \App\Models\SiteSettings::first()->embed_code !!}
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="comments">
                    
                    <div class="comment-wrap">
                        <div class="photo">
                            <div class="avatar" @if($user) style="background-image: url('{{ url('uploads/avatars', [$user->avatar])  }}')" @else style="background-image: url('{{ url('uploads/default-avatar.png')  }}')" @endif></div>
                        </div>
                        <div class="comment-block">
                            <form id="comment_form">
                                <textarea name="comment" id="comment-form" cols="30" rows="3" placeholder="Question or Comment? Type it here." required></textarea>
                                <button class="btn btn-primary btn-sm pull-right">submit</button>
                            </form>
                        </div>
                    </div>

                    
                    <div class="real_comments">

                        @foreach($comments as $comment)

                            <div class="comment-wrap">
                                <div class="photo">
                                    <div class="avatar" @if($comment->avatar) style="background-image: url('{{ url('uploads/avatars', [$comment->avatar])  }}')" @else style="background-image: url('{{ url('uploads/default-avatar.png')  }}')" @endif></div>
                                </div>
                                <div class="comment-block">
                                    <p class="comment-text @if(in_array('Legacy', explode(',', $comment->roles))) text-red @endif">{{ $comment->first_name or "Anonymous" }} {{ $comment->last_name }}: {{ $comment->comment }}</p>
                                    <div class="bottom-comment">
                                        <div class="comment-date">{{ $comment->date }} @if($comment->user_id) @endif</div>
                                    </div>
                                </div>
                            </div>

                        @endforeach

                    </div>
                    
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="comments">
                    <div class="comment-wrap">
                        <div class="comment-block">
                            <p class="learn-more">Product question?
                                <a  href="{{ url('clinically_proven_products') }}" class="btn btn-primary btn-sm" target="_blank">click here</a>
                            </p>
                        </div>
                    </div>
                    <div class="comment-wrap">
                        <div class="comment-block">
                            <p class="learn-more">Business question?
                                <a  href="{{ url('business_overview') }}" class="btn btn-primary btn-sm" target="_blank">click here</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('layouts.partials.sticky_footer')
@endsection

@section('scripts')
    <script type="text/javascript">
        $('#comment_form').on('submit', function (e) {
            e.preventDefault();

            var data = $(this).serializeArray();

            $.ajax({
                url: 'live-broadcast/comments',
                method: "POST",
                dataType: 'json',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: data,
                success: function (data) {
                    getComments();
                    $('#comment-form').val('');
                },
                error: function (jXHR, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
        });

        setInterval(function (e) {
            console.log('10sec interval');
            getComments();
        }, 10000);


        var polledCommentIds = [];
        var getComments = function() {
            $.ajax({
                url: 'live-broadcast/comments/poll',
                method: "GET",
                dataType: 'json',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function (res) {

                    for (var i = 0; i < res.data.length; i++) {
                        var comment = res.data[i];

                        var bg = (comment.avatar) ? 'uploads/avatars/' + comment.avatar : 'uploads/default-avatar.png';
                        var fullBg = '{{ url('/') }}' + '/' + bg;
                        var red = false;
                        if (comment.roles && comment.roles.indexOf('Legacy') > -1) {
                            red = true;
                        }
                        if (polledCommentIds.indexOf(comment.id) < 0) {
                            polledCommentIds.push(comment.id);


                            $('div.real_comments').prepend('' +
                                '<div class="comment-wrap">\n' +
                                '    <div class="photo">\n' +
                                '        <div class="avatar" style="background-image: url('+fullBg+')"></div>\n' +
                                '    </div>\n' +
                                '    <div class="comment-block">\n' +
                                '        <p class="comment-text '+ ((red) ? 'text-red':'') +'"> {{ (Auth::check()) ? Auth::user()->first_name . " " . Auth::user()->last_name : "Anonymous" }}: '+comment.comment+'</p>\n' +
                                '        <div class="bottom-comment">\n' +
                                '            <div class="comment-date">'+comment.date+'</div>\n' +
                                '        </div>\n' +
                                '    </div>\n' +
                                '</div>')
                        }

                    }
                },
                error: function (jXHR, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
        }
    </script>
@endsection
