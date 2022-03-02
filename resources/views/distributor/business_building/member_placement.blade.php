@extends('layouts.distributor_dashboard')

@section('content')
    <div class="inner-content-wrapper">
        <h2>Member Placement</h2>
        <div id="rrk-div" class="team-builder-tool-workspace disabled-workspace">

            <div id="member-training-status" class="row">
                <br>
                <div class="col-xs-12">
                    <div class="training-level">
                        <div class="training-level-details">
                            <p>Click on the name of your new Team Member below and assign their placement within your organizational Team.</p>
                            <p><strong>NOTE</strong>: If you have questions regarding placement, watch this <a href="https://player.vimeo.com/video/288645666" class="popup-vimeo">Member Placement</a> Video and/or discuss this with your TL and/or other members of your Support Team. You can also
                                look in <a href="https://www.synergyworldwide.com/en-us/login/email" target="_blank">Pulse</a> to help you determine the best placement for your new Team Members.</p>
                            <div id="new-member-container">
                                <br>
                                <h4>Members waiting to be placed: click on name below to assign placement.</h4>
                                @if($user->pendingPlacementTeamMembers->count())

                                    @foreach($user->pendingPlacementTeamMembers as $teamMember)
                                        <div class="callout callout-info callout-sm pending_placement" data-id="{{ $teamMember->id }}">
                                            <p>{{ $teamMember->full_name }}</p>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="callout callout-warning callout-sm"><p>No new team member</p></div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-md-6">
                    <br>
                    <iframe src="https://player.vimeo.com/video/288645666" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                    <h3>Watch video to learn more about proper Team Member Placement</h3>
                </div>
            </div>

        </div>
    </div>
    <div class="modal fade" id="placementModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Set Placement</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                    <form action="" id="placementForm"  style="text-align: left">
                        <input type="hidden" name="user_id" id="user_id"/>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="placement">On which side of your organization should this member be placed? </label>
                                <select name="placement" id="placement" class="form-control">
                                    <option value="L">Left</option>
                                    <option value="R">Right</option>
                                </select>
                            </div>
                        </div>
                        <div id="demo" class="collapse">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="team_member_placement_id">What is the Synergy ID of the person your new member should be placed under?</label>
                                    <input type="text" name="team_member_placement_id" id="team_member_placement_id" class="form-control"/>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="determine_placement">On which side of the Synergy ID listed above should your new member be placed? </label>
                                    <select name="determine_placement" id="determine_placement" class="form-control">
                                        <option value="" disabled selected>Select</option>
                                        <option value="L">Left</option>
                                        <option value="R">Right</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>


                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" data-toggle="collapse" data-target="#demo" id="show_hide_content" class="btn btn-info">Show Advanced Placement Option</button>
                    <button type="button" class="btn btn-primary submit-placement-form">Submit</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Hide</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    @if(!$in_training)
        <script type="text/javascript">

            $('#show_hide_content').click(function(e) {
                if ($(this).html() === 'Show Advanced Placement Option') {
                    $(this).html('Hide Advanced Placement Option');

                    return;
                }

                $(this).html('Show Advanced Placement Option')

            });

            $('.pending_placement').on('click', function () {
                $('#user_id').val($(this).data('id'));
                var $modal = $('#placementModal');
                $modal.modal('show');
            });

            $('.submit-placement-form').on('click', function () {
                var formData = $('#placementForm').serialize();

                $.ajax({
                    url: '../set_placement',
                    method: 'POST',
                    dataType: 'json',
                    data: formData,
                    headers: getAjaxHeaders(),
                    success: function () {
                        swal({
                            type: 'success',
                            title: 'Member Placement Completed',
                            text: ''
                        }).then(function () {
                            location.reload()
                        });
                    }
                });
            });

            $('.set_training').on('click', function () {
                $('#user_id2').val($(this).data('id'));
                var $modal = $('#trainingModal');
                $modal.modal('show');
            });

            $('.submit-training-form').on('click', function () {
                var formData = $('#trainingForm').serialize();

                $.ajax({
                    url: '../set_training_status',
                    method: 'POST',
                    dataType: 'json',
                    data: formData,
                    headers: getAjaxHeaders(),
                    success: function () {
                        location.reload();
                    }
                });
            });


        </script>
    @endif
@endsection
