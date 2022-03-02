@extends('layouts.distributor_dashboard_plain')
@section('content')
    <section class="core-team-viewer">
        <div class="inner-content-wrapper">
            <div class="team-tree__container">
                <div class="row team-tree">
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-xs-6 text-center team-tree__level">
                                <p class="best_text_p">Best Left Team</p>
                                <a href="#"
                                   class="me team-tree__node {{ $user_node_class }} team-tree__node--me team-tree__node--active"
                                   data-border="me" data-id="{{ $user->id }}" data-toggle="tooltip" data-placement="top" title="{{ $user->full_name }}">
                                    <img src="{{ asset('images/sq-placeholder.png') }}" alt="">
                                    <span>{{ $user->first_name }}</span>
                                </a>
                            </div>
                            <div class="col-xs-6 text-center team-tree__heading">
                                <p class="best_text_p">Best Right Team</p>
                            </div>
                            <div class="col-md-6 col-md-offset-3 team-tree__top-branch-wrapper">
                                <div class="team-tree__top-branch team-tree__border--me"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="row team-tree__body-container">
                            <div class="col-md-6 team-tree__left-tree">
                                <div class="row">
                                    <div class="col-md-2 team-tree__nav-container">
                                        <a href="#"
                                           class="team-tree__arrow team-tree__arrow-left left-go-left team-tree__arrow--visible"
                                           data-side="left" data-ids="{{ formatTreeNodeIds($trees['L']) }}">
                                            @if(count($trees['L']))
                                            <div class="team-tree__arrow-wrapper">
                                                <img src="{{ asset('images/arrow-left.png') }}">
                                                <span>{{ count($trees['L']) }}</span>
                                            </div>
                                            @endif
                                        </a>
                                    </div>

                                    <div id="team-tree__left-content">
                                        {!! $firstLeft['treeHtml'] !!}
                                        <!-- team-tree__main-container -->
                                    </div>

                                    <div class="col-md-2 team-tree__nav-container">
                                        <a href="#" class="team-tree__arrow team-tree__arrow-right left-go-right"
                                           data-side="left" data-ids="[]">
                                            <div class="team-tree__arrow-wrapper">
                                                <img src="{{ asset('images/arrow-right.png')}}">
                                                <span></span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- team-tree__left-tree -->

                            <div class="col-md-6 team-tree__right-tree">
                                <div class="row">
                                    <div class="col-md-2 team-tree__nav-container">
                                        <a href="#" class="team-tree__arrow team-tree__arrow-left right-go-left"
                                           data-side="right" data-ids="[]">
                                            <div class="team-tree__arrow-wrapper">
                                                <img src="{{ asset('images/arrow-left.png') }}">
                                                <span></span>
                                            </div>
                                        </a>
                                    </div>

                                    <div id="team-tree__right-content">
                                        {!! $firstRight['treeHtml'] !!}
                                        <!-- team-tree__main-container -->
                                    </div>

                                    <div class="col-md-2 team-tree__nav-container">
                                        <a href="#"
                                           class="team-tree__arrow team-tree__arrow-right right-go-right team-tree__arrow--visible"
                                           data-side="right" data-ids="{{ formatTreeNodeIds($trees['R']) }}">
                                            @if(count($trees['R']))
                                            <div class="team-tree__arrow-wrapper">
                                                <img src="{{ asset('images/arrow-right.png') }}">
                                                <span>{{ count($trees['R']) }}</span>
                                            </div>
                                            @endif
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- team-tree__right-tree -->

                            <div class="team-tree__tree-repo">
                                @foreach($trees['L'] as $node)
                                    <div id="tree_content_{{ $node['id'] }}">
                                        {!! $node['treeHtml'] !!}
                                    </div>
                                @endforeach
                                    <div id="tree_content_{{ $firstLeft['id'] }}">
                                        {!! $firstLeft['treeHtml'] !!}
                                    </div>
                                    <div id="tree_content_{{ $firstRight['id'] }}">
                                        {!! $firstRight['treeHtml'] !!}
                                    </div>
                                @foreach($trees['R'] as $node)
                                    <div id="tree_content_{{ $node['id'] }}">
                                        {!! $node['treeHtml'] !!}
                                    </div>
                                @endforeach

                            </div>
                            <!-- team-tree__tree-repo -->
                        </div>
                        <!-- team-tree__body-container -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal" id="viewTL" tabindex="-1" role="dialog" aria-labelledby="viewTL" aria-hidden="true" style=" margin-top: 5%;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content"></div>
        </div>
    </div>
@endsection


@section('scripts')
    <script type="text/javascript">
        $('.team-tree__node').tooltip();
        $('.send-request').on('click', function () {
            var $elem = $(this);
            var $modal = $($elem.data('target'));
            var achievement_id = $elem.data('achievement-id');

            $modal.modal('show');

            $.ajax({
                type: 'POST',
                dataType: 'json',
                data: {
                    widgets: [
                        {
                            name: 'Achievements',
                            attributes: {
                                achievement_id: achievement_id
                            }
                        }
                    ]
                },
                headers: getAjaxHeaders(),
                url: window.origin + '/generateWidgets',
                success: function (data) {
                    $modal.find('.modal-body').html(data.html);

                    $('.send-request-confirm').off('click').on('click', function () {
                        $.ajax({
                            url: '/achievement_approvals',
                            method: "POST",
                            dataType: 'json',
                            headers: getAjaxHeaders(),
                            data: {
                                user_id: '{{ $user->id }}',
                                achievement_level_id: achievement_id
                            },
                            success: function (data) {
                                alert('request sent');
                                $modal.modal('hide');
                                location.reload();
                            },
                            error: function (jXHR, textStatus, errorThrown) {
                                alert(errorThrown);
                            }
                        });
                    });
                },
                error: function (data) {

                }
            });


        });

        $('.team-tree__arrow').each(function (e) {
            if ($(this).data('ids').length) {
                $(this).addClass('team-tree__arrow--visible');
            }
        });

        $('.team-tree__arrow-left').on('click', function (e) {
            e.preventDefault();

            var side = $(this).data('side');
            var elem = $('.' + side + '-main-content');
            var l_ids = $(this).data('ids');
            var r_ids = $('.' + side + '-go-right').data('ids');
            var n = l_ids[l_ids.length - 1];

            $('#team-tree__' + side + '-content').html($('#tree_content_' + n).html());

            l_ids.pop();
            r_ids.push(elem.data('id'));

            $('.' + side + '-go-left').data('ids', l_ids).find('span').text(l_ids.length);
            $('.' + side + '-go-right').addClass('team-tree__arrow--visible').data('ids', r_ids).find('span').text(r_ids.length);

            if (l_ids.length <= 0)
                $('.' + side + '-go-left').removeClass('team-tree__arrow--visible');

            border_hover();
        });

        $('.team-tree__arrow-right').on('click', function (e) {
            e.preventDefault();

            var side = $(this).data('side');
            var elem = $('.' + side + '-main-content');
            var r_ids = $(this).data('ids');
            var l_ids = $('.' + side + '-go-left').data('ids');
            var n = r_ids[r_ids.length - 1];

            $('#team-tree__' + side + '-content').html($('#tree_content_' + n).html());

            r_ids.pop();
            l_ids.push(elem.data('id'));
            elem.data('id', n);

            $('.' + side + '-go-left').addClass('team-tree__arrow--visible').data('ids', l_ids).find('span').text(l_ids.length);
            $('.' + side + '-go-right').data('ids', r_ids).find('span').text(r_ids.length);

            if (r_ids.length <= 0)
                $('.' + side + '-go-right').removeClass('team-tree__arrow--visible');

            border_hover();
        });


        function border_hover() {
            $('.team-tree__node')
                    .on('mouseenter', function () {
                        var target = $(this).data('border');

                        if (target) {
                            $('.team-tree__border--' + target).addClass('team-tree__border--active');
                        }
                    })
                    .on('mouseleave', function () {
                        var target = $(this).data('border');

                        if (target) {
                            $('.team-tree__border--' + target).removeClass('team-tree__border--active');
                        }
                    });
        }

        border_hover();


        $('body').on('click', '.team-tree__node', function() {
            var $elem = $(this);
            var elem_node_id = $elem.data('id');
            var $modal = $('#viewTL');
            $modal.modal('hide');

            if (elem_node_id) {
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        widgets: [
                            {
                                name: 'Events\\Modals\\TeamViewer',
                                attributes: {
                                    user_id: elem_node_id
                                }
                            }
                        ]
                    },
                    headers: getAjaxHeaders(),
                    url: window.origin + '/generateWidgets',
                    success: function (data) {
                        $modal.find('.modal-content').html(data.html);
                        $modal.modal('show');
                    }
                });
            }
        })
    </script>
@endsection
