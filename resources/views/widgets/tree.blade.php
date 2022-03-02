<div class="col-md-8 team-tree__main-container text-center {{ $sidePlacement }}-main-content" data-id="{{ $node->id }}">
    <div class="row">
        <div class="col-xs-12 team-tree__top-level team-tree__node-wrapper team-tree__border--{{ $sidePlacement }}">
            <div class="weak_leg_info_container" style="left: 60px;">
                <strong><span style="color:#7fc37a">{{ number_format($node->synergy_left_leg_cv, 2) }} CV</span></strong> <br>
                <strong><span>{{ number_format($node->synergy_prev_left_leg_cv, 2) }} CV</span></strong>
            </div>
             <a id="dist_id_{{ $node->id }}" data-id="{{ $node->id }}"
               href="#" class="team-tree__node {{ getTreeNodeClass($mainTree, $node->id) }} tree-avatar" data-border="{{ $sidePlacement }}"
            data-toggle="tooltip" data-placement="top" title="{{ $node->first_name . " ". $node->last_name }}">
                @if($node->avatar)
                    <img src="{{ asset('uploads/avatars/' . $node->avatar) }}" alt="">
                @else
                    <img src="{{ asset('images/sq-placeholder.png') }}" alt="">
                @endif
            </a> -
            <div class="weak_leg_info_container" style="right: 60px;">
                <strong><span style="color:#7fc37a">{{ number_format($node->synergy_right_leg_cv, 2) }} CV</span></strong> <br>
                <strong><span>{{ number_format($node->synergy_prev_right_leg_cv, 2) }} CV</span></strong>
            </div>
        </div>
        <div class="col-md-6 col-md-offset-3 team-tree__top-branch-wrapper">
            <div class="team-tree__top-branch team-tree__border--{{ $sidePlacement }}"></div>
        </div>

        <div class="team-tree__level-two-wrapper">
            <div class="col-xs-6">
                <div class="row">
                    {!! generateTreeNodeItem($mainTree, $node->id, ['L'], $sidePlacement) !!}

                    <div class="col-md-6 col-md-offset-3 team-tree__top-branch-wrapper">
                        <div class="team-tree__top-branch team-tree__border--{{ $sidePlacement }} team-tree__border--{{ $sidePlacement }}-left"></div>
                    </div>

                    <div class="team-tree__level-three-wrapper">
                        <div class="col-xs-6">
                            <div class="row">
                                {!! generateTreeNodeItem($mainTree, $node->id, ['L','L']) !!}

                                <div class="col-xs-12 team-tree__level-last-container">
                                    <div class="team-tree__level-last">
                                        {!! generateTreeNodeItem($mainTree, $node->id, ['L','L','L']) !!}
                                        {!! generateTreeNodeItem($mainTree, $node->id, ['L','L','R']) !!}
                                    </div>
                                    <!-- team-tree__level-last -->
                                </div>

                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="row">
                                {!! generateTreeNodeItem($mainTree, $node->id, ['L','R']) !!}

                                <div class="col-xs-12 team-tree__level-last-container">
                                    <div class="team-tree__level-last">
                                        {!! generateTreeNodeItem($mainTree, $node->id, ['L','R','L']) !!}
                                        {!! generateTreeNodeItem($mainTree, $node->id, ['L','R','R']) !!}
                                    </div>
                                    <!-- team-tree__level-last -->
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- team-tree__level-three-wrapper -->

                </div>
            </div>

            <div class="col-xs-6">
                <div class="row">
                    {!! generateTreeNodeItem($mainTree, $node->id, ['R'], $sidePlacement) !!}
                    <div class="col-md-6 col-md-offset-3 team-tree__top-branch-wrapper">
                        <div class="team-tree__top-branch team-tree__border--{{ $sidePlacement }} team-tree__border--{{ $sidePlacement }}-right"></div>
                    </div>

                    <div class="team-tree__level-three-wrapper">
                        <div class="col-xs-6">
                            <div class="row">
                                {!! generateTreeNodeItem($mainTree, $node->id, ['R','L']) !!}

                                <div class="col-xs-12 team-tree__level-last-container">
                                    <div class="team-tree__level-last">
                                        {!! generateTreeNodeItem($mainTree, $node->id, ['R','L','L']) !!}
                                        {!! generateTreeNodeItem($mainTree, $node->id, ['R','L','R']) !!}
                                    </div>
                                    <!-- team-tree__level-last -->
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="row">
                                {!! generateTreeNodeItem($mainTree, $node->id, ['R','R']) !!}

                                <div class="col-xs-12 team-tree__level-last-container">
                                    <div class="team-tree__level-last">
                                        {!! generateTreeNodeItem($mainTree, $node->id, ['R','R','L']) !!}
                                        {!! generateTreeNodeItem($mainTree, $node->id, ['R','R','R']) !!}
                                    </div>
                                    <!-- team-tree__level-last -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- team-tree__level-three-wrapper -->

                </div>
            </div>

        </div>
        <!-- team-tree__level-two-wrapper -->

    </div>
</div>
<!-- team-tree__main-container -->