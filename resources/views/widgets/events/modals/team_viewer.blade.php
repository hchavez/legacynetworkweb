<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h2>{{ $user['first_name'] . " " . $user['last_name'] }}</h2>
    <h4>#{{ $user['synergy_id'] }}</h4>
    <h3><a href="tel:{{ $user['mobile'] }}">{{ $user['mobile'] }}</a></h3>
    <h3><a href="mailto:{{ $user['email'] }}">{{ $user['email'] }}</a></h3>
</div>
<div class="modal-body">
    <div class="row">
        <br>
        <div class="col-sm-4">
            <div class="card">
                <canvas class="header-bg" width="250" height="70" id="header-blur"></canvas>
                <div class="avatar">
                    @if($tl && $tl['avatar'])
                        <img id="tl_avatar" src="/uploads/avatars/{{ $tl['avatar'] }}" alt="" />
                    @else
                        <img id="tl_avatar" src="/uploads/default-avatar.png" alt="" />
                    @endif
                </div>
                <div class="content">
                    <p id="tl_name">@if($tl) {{ $tl['first_name'] . " " . $tl['last_name'] }} @endif</p>
                    <p id="tl_email">@if($tl) <a href="mailto:{{ $tl['email'] }}">{{ $tl['email'] }}</a> @endif</p>
                    <p id="tl_mobile">@if($tl) <a href="tel:{{ $tl['mobile'] }}">{{ $tl['mobile'] }}</a> @endif</p>
                    <div><h3 style="color: black;">TL</h3></div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <canvas class="header-bg" width="250" height="70" id="header-blur"></canvas>
                <div class="avatar">
                    @if($ctl && $ctl['avatar'])
                        <img id="ctl_avatar" src="/uploads/avatars/{{ $ctl['avatar'] }}" alt="" />
                    @else
                        <img id="ctl_avatar" src="/uploads/default-avatar.png" alt="" />
                    @endif
                </div>
                <div class="content">
                    <p id="ctl_name">@if($ctl) {{ $ctl['first_name'] . " " . $ctl['last_name'] }} @endif</p>
                    <p id="ctl_email">@if($ctl) <a href="mailto:{{ $ctl['email'] }}">{{ $ctl['email'] }}</a> @endif</p>
                    <p id="ctl_mobile">@if($ctl) <a href="tel:{{ $ctl['mobile'] }}">{{ $ctl['mobile'] }}</a> @endif</p>
                    <div><h3 style="color: black;">CTL</h3></div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <canvas class="header-bg" width="250" height="70" id="header-blur"></canvas>
                <div class="avatar">
                    @if($stl && $stl['avatar'])
                        <img id="stl_avatar" src="/uploads/avatars/{{ $stl['avatar'] }}" alt="" />
                    @else
                        <img id="stl_avatar" src="/uploads/default-avatar.png" alt="" />
                    @endif
                </div>
                <div class="content">
                    <p id="stl_name">@if($stl) {{ $stl['first_name'] . " " . $stl['last_name'] }} @endif</p>
                    <p id="stl_email">@if($stl) <a href="mailto:{{ $stl['email'] }}">{{ $stl['email'] }}</a> @endif</p>
                    <p id="stl_mobile">@if($stl) <a href="tel:{{ $stl['mobile'] }}">{{ $stl['mobile'] }}</a> @endif</p>
                    <div><h3 style="color: black;">STL</h3></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="team-tree__container" id="modalTeamViewer">
            <div class="row team-tree">
                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-xs-6 text-center team-tree__level">
                            <p class="best_text_p">Best Left Team</p>
                            <a href="#"
                               class="me team-tree__node {{ $user_node_class }} team-tree__node--me team-tree__node--active"
                               data-border="me" data-id="{{ $user->id }}">
                                <img src="{{ asset('images/sq-placeholder.png') }}" alt="">
                                <span>{{ initials($user->full_name) }}</span>
                                <div class="team-tree__name team-tree__name--left">{{ $user->full_name }}</div>
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
                                <div class="col-md-2 team-tree__nav-container" style="height: 239px;">
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

                                <div class="col-md-2 team-tree__nav-container" style="height: 239px;">
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
                                <div class="col-md-2 team-tree__nav-container" style="height: 239px;">
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

                                <div class="col-md-2 team-tree__nav-container" style="height: 239px;">
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
</div>

<script>
    var modalTeamView = $('#modalTeamViewer');
    modalTeamView.find('.team-tree__arrow-left').on('click', function (e) {
        e.preventDefault();

        var m_side = $(this).data('side');
        var m_elem = modalTeamView.find('.' + m_side + '-main-content');
        var m_l_ids = $(this).data('ids');
        var m_r_ids = modalTeamView.find('.' + m_side + '-go-right').data('ids');
        var m_n = m_l_ids[m_l_ids.length - 1];

        modalTeamView.find('#team-tree__' + m_side + '-content').html(modalTeamView.find('#tree_content_' + m_n).html());

        m_l_ids.pop();
        m_r_ids.push(m_elem.data('id'));

        modalTeamView.find('.' + m_side + '-go-left').data('ids', m_l_ids).find('span').text(m_l_ids.length);
        modalTeamView.find('.' + m_side + '-go-right').addClass('team-tree__arrow--visible').data('ids', m_r_ids).find('span').text(m_r_ids.length);

        if (m_l_ids.length <= 0)
            modalTeamView.find('.' + m_side + '-go-left').removeClass('team-tree__arrow--visible');

        border_hover();
    });

    modalTeamView.find('.team-tree__arrow-right').on('click', function (e) {
        e.preventDefault();

        var m_side = $(this).data('side');
        var m_elem = modalTeamView.find('.' + m_side + '-main-content');
        var m_r_ids = $(this).data('ids');
        var m_l_ids = modalTeamView.find('.' + m_side + '-go-left').data('ids');
        var m_n = m_r_ids[m_r_ids.length - 1];

        modalTeamView.find('#team-tree__' + m_side + '-content').html(modalTeamView.find('#tree_content_' + m_n).html());

        m_r_ids.pop();
        m_l_ids.push(m_elem.data('id'));
        m_elem.data('id', m_n);

        modalTeamView.find('.' + m_side + '-go-left').addClass('team-tree__arrow--visible').data('ids', m_l_ids).find('span').text(m_l_ids.length);
        modalTeamView.find('.' + m_side + '-go-right').data('ids', m_r_ids).find('span').text(m_r_ids.length);

        if (m_r_ids.length <= 0)
            modalTeamView.find('.' + m_side + '-go-right').removeClass('team-tree__arrow--visible');

        border_hover();
    });
</script>