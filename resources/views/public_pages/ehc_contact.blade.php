@extends('layouts.legacynetwork')
@section('page-title', 'Legacy Network | Contact')
@section('content')
    <div class="public_page_container buy_products_page_container">
        <div class='banner faded'>
            <header>
                <div class='container'>
                    <a href='{{ url('helping_entrepreneurs_leave_a_legacy') }}' style='align-self: center;'>
                        <img src='{{ asset('new_images/white_logo.png') }}' alt='Legacy Network'>
                    </a>
                    <nav role="navigation">
                        <ul id='nav-ul'>
                            @foreach($bannerConfig->bannerLinks as $bannerLink)
                                <li class='menu_item'>
                                    <a href="{{ $bannerLink['url'] }}" target='{{ isset($bannerLink['target']) ? $bannerLink['target'] : "" }}'>{{ $bannerLink['label'] }}</a>
                                </li>
                            @endforeach
                        </ul>
                        @if(session()->has('purl_user'))
                            <a class='btn' href='{{ $bannerConfig->actionLink }}'>{{ $bannerConfig->actionText }}</a>
                        @endif
                        <i id='nav-toggle' class="fa fa-bars" aria-hidden="true"></i>
                    </nav>
                </div>
            </header>
            <div class='container contact_page_container'>

                @if(session()->has('purl_user'))
                    <img src="{{ url('uploads/avatars', [$avatar])  }}" alt="user avatar">
                @endif

                <section class="contact_page">
                    <div class="contact_page--row">
                            <h1 class='contact_header'>Contact</h1>
                            <h2 class='contact_name'>{{  $name }}</h2>
                            <p class='contact_details'>{{  $email }} <br/>{{  $mobile }}</p>
                    </div>
                    <div class="contact_page--row">
                        <div class='name_address_container'>
                            <input type="text" class="form-control" id="name" placeholder="Your Name" required>
                            <input type="text" class="form-control" id="email" placeholder="Email Address" required>
                        </div>
                        <div class='msg_container'>
                            <textarea name="message" id="message" class="form-control" placeholder="Message" rows='10'></textarea>
                        </div>
                        <button type="submit" class="submit_button" id='send_message'>Send</button>
                    </div>
                </section>
            </div>
        </div>
        <br>
        <br>
        <br>

    </div>
@endsection


@section('scripts')
    <script>
        $('#send_message').on('click', function (e) {
            e.preventDefault();

            $(this).attr('disabled', true);
            $(this).html('Please Wait');

            $.ajax({
                context: this,
                url: '/contact/send_message',
                type: 'POST',
                data: {
                    name: $('#name').val(),
                    email_from: $('#email').val(),
                    email_to: '{{  $email }}',
                    message: $('#message').val(),
                },
                headers: getAjaxHeaders(),
                success: function () {
                    $(this).attr('disabled', false);
                    $(this).html('Send');
                    swal(
                        'Successful!',
                        'Email Sent',
                        'success'
                    ).then(function() {
                        location.reload()
                    });


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
@endsection