@extends('layouts.distributor_dashboard')

@section('styles')
    <style>
        .faqHeader {
            font-size: 22px;
            margin: 15px 0;
        }
    </style>
@endsection
@section('content')
    <div class="inner-content-wrapper">
        <h1>Frequently Asked Questions</h1>
            <div class="panel-group" id="accordion">
                @foreach($faq_categories as $faq_category)
                    <p class="faqHeader">{{ $faq_category->name }}</p>
                    @foreach($faq_category->faqs as $faq)
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#{{ $faq->id . "faq" }}">{{ $faq->question }}</a>
                                </h4>
                            </div>
                            <div id="{{ $faq->id . "faq" }}" class="panel-collapse collapse">
                                <div class="panel-body">
                                    {{ $faq->long_answer }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <br>
                    <br>
                    <br>
                @endforeach
            </div>
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
