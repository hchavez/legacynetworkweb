@extends('layouts.distributor_dashboard')

@section('content')
    <div class="inner-content-wrapper">
        <h2>Member Activation</h2>
            <h3>Activate New Team Member</h3>
            <p>Click on the “Activate” button next to the new members name below and their business tools will become active.</p>

            <div id="member-training-status" class="row">
                <br>
                <div class="col-xs-12">
                    <div class="training-level">
                        <div class="training-level-details">
                            <h3>New Team Members in Training</h3>

                            <div id="new-member-container2">
                                @if($user->pendingTrainingTeamMembers->count())
                                    @foreach($user->pendingTrainingTeamMembers as $teamMember)
                                    <div class="callout callout-info callout-sm">
                                        <p>{{ $teamMember->full_name }} 
                                        <a href="{{ url('distributor/training/user_entrepreneurship_training/'.$teamMember->id) }}">
                                        <button class="btn btn-primary btn-sm pull-right" style="height: 24px; padding: 0 10px;">View Training Progress</button>
                                        </a>
                                        <button class="btn btn-primary btn-sm pull-right set_training" data-id="{{ $teamMember->id }}" style="height: 24px; padding: 0 10px; margin: 0 10px;">Activate</button></p>
                                    </div>
                                    @endforeach
                                @else
                                    <div class="callout callout-warning callout-sm"><p>No new team member</p></div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="trainingModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Activate Member</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Has this person finished their Entrepreneurship Training and are they ready to be certified and activated?</h4>

                        </div>
                        <form action="" id="trainingForm" style="display: none">
                            <input type="hidden" name="user_id" id="user_id2"/>
                            <input type="hidden" name="is_training_done" id="is_training_done" value="1"/>
                        </form>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary submit-training-form">Activate</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @if(!$in_training)
    <script type="text/javascript">
        $('.pending_placement').on('click', function() {
            $('#user_id').val($(this).data('id'));
            var $modal = $('#placementModal');
            $modal.modal('show');
        });

        $('.submit-placement-form').on('click', function() {
            var formData = $('#placementForm').serialize();

            $.ajax({
                url: '../set_placement',
                method: 'POST',
                dataType: 'json',
                data: formData,
                headers: getAjaxHeaders(),
                success: function () {
                    location.reload();
                }
            });
        });

        $('.set_training').on('click', function() {
            $('#user_id2').val($(this).data('id'));
            var $modal = $('#trainingModal');
            $modal.modal('show');
        });

        $('.submit-training-form').on('click', function() {
            var formData = $('#trainingForm').serialize();

            $.ajax({
                url: '../set_training_status',
                method: 'POST',
                dataType: 'json',
                data: formData,
                headers: getAjaxHeaders(),
                success: function () {
                        swal({
                            type: 'success',
                            title: 'Member Activated Completed',
                            text: ''
                        }).then(function () {
                            location.reload()
                        });
                    }

            });
        });


    </script>
    @endif
@endsection
