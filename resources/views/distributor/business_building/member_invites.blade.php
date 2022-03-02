@extends('layouts.distributor_dashboard')

@section('content')
    <div class="inner-content-wrapper">
        <h2>Invite Guests</h2>
        <div class="row">
            <form action="" id="member_invite_form">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="recipient_name">Recipient Name</label>
                        <input class="form-control" type="text" name="recipient_name[]" id="recipient_name"
                               placeholder="Name of recipient (required)" autocomplete="false"/>
                        <label for="email">Email</label>
                        <input class="form-control" type="email" name="email[]" id="email"
                               placeholder="Email (required)" required autocomplete="false"/>
                        <label for="subject">Subject</label>
                        <input class="form-control" type="text" name="subject" id="subject"
                               placeholder="Subject (required)" required autocomplete="false"/>
                        <label for="body">Message</label>
                        <textarea name="body" id="body" cols="30" rows="10" class="form-control"></textarea>
                    </div>

                    <input type="submit" class="btn btn-primary" value="Send Invite">

                </div>
            </form>
        </div>
    </div>

    <div class="inner-content-wrapper table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Name</th>
                    <th>Link</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach($invites as $invite)
                <tr class="@if($invite->is_visited) success @else danger @endif">
                    <td>{{ $invite->email }}</td>
                    <td>{{ $invite->name }}</td>
                    <td id="link_id_{{ $invite->id }}">{{ url('') . "/" . Auth::user()->purl . '?token=' . $invite->token }}</td>
                    <td><button class="btn btn-info copy-link" data-id="{{ $invite->id }}">Copy Link</button></td>
                    <td>
                        <button class="btn btn-danger delete-invite" data-id="{{ $invite->id }}">Delete</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
    <div class="inner-content-wrapper hidden" id="invite_links_sent">
        <h2>Invite Links Sent</h2>

        <div class="invite_links_sent_container">

        </div>
    </div>
@endsection

@section('scripts')
    @if(!$in_training)
        <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=cl3yfpsmcg0sz8pmzo4h4zxm4nd9yodxydk5l1t5xp3mrphf"></script>
        <script type="text/javascript">
            tinymce.init({selector: 'textarea'});

            $('.resend-invite').on('click', function(){
                $.ajax({
                    url: 'member_invites/resend',
                    method: "POST",
                    data: {
                        id: $(this).data('id'),
                    },
                    dataType: 'json',
                    headers: getAjaxHeaders(),
                    success: function (response) {
                        swal({
                            type: 'success',
                            title: 'Invite Re-sent',
                            text: 'Emails are sent to the recipient'
                        })
                    }
                });

            });


            $('.delete-invite').on('click', function(){
                $.ajax({
                    context: this,
                    url: 'member_invites/' + $(this).data('id'),
                    method: "POST",
                    data: {
                        _method: 'DELETE'
                    },
                    dataType: 'json',
                    headers: getAjaxHeaders(),
                    success: function () {
                        $(this).parents('tr').remove();

                        swal({
                            type: 'success',
                            title: 'Deleted'
                        })
                    }
                });

            });

            $('.copy-link').on('click', function(){
                copyToClipboard('#link_id_' + $(this).data('id'));
            });

            $('#member_invite_form').on('submit', function (e) {
                e.preventDefault();
                tinymce.triggerSave();
                var $form = $(this);
                var data = $form.serializeArray();
                $.ajax({
                    url: 'member_invites',
                    method: "POST",
                    data: data,
                    dataType: 'json',
                    headers: getAjaxHeaders(),
                    success: function (response) {
                        swal({
                            type: 'success',
                            title: 'Invites Sent',
                            text: 'Emails are sent to the recipients'
                        }).then(function() {
                            location.reload();
                        });
                    }
                });

            });

            function copyToClipboard(element) {
                var $temp = $("<input>");
                $("body").append($temp);
                $temp.val($(element).text()).select();
                document.execCommand("copy");
                $temp.remove();

                swal('link copied');
            }

        </script>
    @endif
@endsection
