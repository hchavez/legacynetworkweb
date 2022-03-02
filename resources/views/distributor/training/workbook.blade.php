@extends('layouts.distributor_dashboard')

@section('content')
    <div class="inner-content-wrapper">
        <h2>
            Entrepreneurship Training Workbook
        </h2>

        <a target="_blank" href="{{ url('') }}/files/Entrepreneurship_Training_Workbook.pdf">
            <img src="{{ url('') }}/files/bookcover.jpg" alt="" width="400px">
        </a>
    </div>
@endsection
