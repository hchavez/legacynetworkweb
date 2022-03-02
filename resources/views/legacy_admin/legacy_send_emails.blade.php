@extends('layouts.legacy_dashboard')


@section('content')
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Send Email</h3>

        </div>
        <div class="panel-body">
            <form id="legacy_send_email" action="{{ url('legacy_admin/send_email') }}" method="POST">
                {{ csrf_field() }}
                <label for="subject">Subject</label>
                <input type="text" name="subject" class="form-control" required>
                <label for="body">Message Body</label>
                <textarea name="body" id="body" cols="30" rows="10" class="form-control"></textarea>
                <br/>
                <section>
                    @for($c = 0; $c <= 12; $c++)
                        <label class="checkbox-inline">
                            @if($c == 0)
                                <input type="checkbox" name="level[]" value="{{ $c }}">C
                            @else
                                <input type="checkbox" name="level[]" value="{{ $c }}">Level {{ $c }}
                            @endif
                        </label>
                    @endfor
                    <label class="checkbox-inline">
                        <input type="checkbox" id="selectAllLevels"> Select All
                    </label>
                </section>
                <br/>
                <section>
                    <div class="form-group">
                        <label for="send_type">Send As</label>
                        <select name="send_type" id="send_type" class="form-control" required="">
                            <option value="" selected disabled>Choose Option</option>
                            <option value="both">Both Email and Notification</option>
                            <option value="email">As Email Only</option>
                            <option value="notification">As Notification Only</option>
                            <option value="test_emails" style="font-weight: bold;">SEND TO TEST EMAILS ONLY</option>
                            <option value="specific_emails" style="font-weight: bold;">SEND TO SPECIFIC EMAILS ONLY</option>
                        </select>
                    </div>
                </section>
                <br/>
                <section>
                    <button class="btn btn-primary btn-sm">Send</button>
                </section>

                <div class='recipient_container'>
                </div>
                <br>
                <br>
                <br>
                <div class="form-group">
                    <label for="sponsor">Search Specific Users</label>
                    <div class="typeahead__container">
                        <div class="typeahead__field">
                            <span class="typeahead__query">
                                <input class="js-typeahead-sel-recipients"
                                       type="search"
                                       placeholder="Search" autocomplete="off"
                                       value=""
                                >
                            </span>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=cl3yfpsmcg0sz8pmzo4h4zxm4nd9yodxydk5l1t5xp3mrphf"></script>
    <script type="text/javascript">
        $('#selectAllLevels').on('click', function () {
            if ($('input[name="level[]"]:checked').length > 0) {
                $('input[name="level[]"]').prop('checked', '');
                $(this).prop('checked', '');
            } else {
                $('input[name="level[]"]').prop('checked', 'checked');
            }
        });

        if ('{{ $notify }}' == 1) {
            swal({
                title: 'Processed',
                text: '',
                type: 'success'
            })
        }

        tinymce.init({
            selector: 'textarea',
            plugins: 'image',
            relative_urls: false,
            convert_urls: false,
            document_base_url: '{{ url('/') }}',
            images_upload_url: 'mce_image_upload',
            images_upload_handler: function (blobInfo, success, failure) {
                var xhr, formData;

                xhr = new XMLHttpRequest();
                xhr.withCredentials = false;
                xhr.open('POST', 'mce_image_upload');
                xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));

                xhr.onload = function () {
                    var json;

                    if (xhr.status != 200) {
                        failure('HTTP Error: ' + xhr.status);
                        return;
                    }
                    json = JSON.parse(xhr.responseText);
                    if (!json || typeof json.location != 'string') {
                        failure('Invalid JSON: ' + xhr.responseText);
                        return;
                    }

                    success(json.location);
                };

                formData = new FormData();
                formData.append('file', blobInfo.blob(), blobInfo.filename());

                xhr.send(formData);
            }
        });

        $.typeahead({
            input: '.js-typeahead-sel-recipients',
            minLength: 1,
            order: 'asc',
            dynamic: true,
            delay: 500,
            emptyTemplate: 'no result for @{{query}}',
            source: {
                users: {
                    display: 'display_name',
                    ajax: function (query) {
                        return {
                            type: 'POST',
                            url: '{{ url('search/distributors') }}',
                            headers: getAjaxHeaders(),
                            data: {
                                q: '@{{query}}'
                            }
                        }
                    }
                }
            },
            callback: {
                onClick: function (node, a, item, event) {
                    var s_email = '<div>\n' +
                        '                        <input type="text" name="specific_emails[]" readonly value="'+item.email+'">\n' +
                        '                        <i class="icon-submenu lnr lnr-cross"></i>\n' +
                        '                    </div>';
                    $('.recipient_container').append($(s_email));
                },
                onClickAfter: function() {
                    $('.js-typeahead-sel-recipients').val('')
                }
            }
        });

        $('.recipient_container').on('click', '.lnr-cross', function() {
            $(this).parent().remove();
        })
    </script>
@endsection
