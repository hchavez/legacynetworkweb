@extends('layouts.frontend')
@section('page-title', 'FAQ | Legacy Network')
@section('content')
    <div class="container-fluid faq_page">
        <div class="row">
            <div class="col-md-12">
                <header>
                    <form action="{{ url('faq/') }}" method="GET">
                        <label for="search_faq">Advice and answers from Legacy Network</label>
                        <input type="text" name="q" id="search_faq" class="form-control" placeholder="Search" value="{{ $_GET['q'] or "" }}">
                    </form>
                </header>
            </div>
        </div>
        <div class="row" id="faq_content">
            @if($searching && $result_count < 1)
                <div class="col-md-12">{{ $result_count }} results found for: {{ $_GET['q'] or "" }}</div>
            @endif
            <div class="col-md-12">
                @foreach($results as $result)
                    <div class="card">
                        <div class="card-header">
                            {{ $result->question }}
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><strong>Quick Answer</strong>: {{ $result->short_answer }}</h5>
                            <p class="card-text">{{ $result->long_answer }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
