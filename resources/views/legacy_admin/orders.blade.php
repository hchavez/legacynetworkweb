@extends('layouts.legacy_dashboard')

@section('content')
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">LN Merchandise Orders</h3>
         
             <input type="hidden" id="status">
                <p class="panel-subtitle dataTableFilterButtons">
                    <a href="#" data-ftarget="reset" class="btn-xs btn-warning" data-value=""><strong>All</strong></a> |
                    <a href="#" data-ftarget="status" data-value="active"><strong>Ongoing</strong></a>
                    |
                    <a href="#" data-ftarget="status" data-value="inactive"><strong>Processed</strong></a>
                </p>
        </div>
        <div class="panel-body">
           <!-- <p><a href="{{ url('legacy_admin/legacy/merchandise/create') }}" class="btn btn-primary"> Create   </a></p> -->
            <table id="bc_table" class="table table-hover table-responsive display" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th></th>
                    <th>Order No</th>
                    <th>Customer name</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
  
@endsection