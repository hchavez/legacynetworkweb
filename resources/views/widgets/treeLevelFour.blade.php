<div class="col-xs-6 team-tree__level-last-wrapper ">
    <a id="dist_id_{{ $node_->id or "" }}" data-id="{{ $node_->id or "" }}" href="#"
       class="team-tree__node  {{ $nodeClass }}"
       data-toggle="tooltip" data-placement="top" title="{{ ($node_) ? $node_->first_name . " " . $node_->last_name : "" }}"
    >
        <img src="{{ asset('images/sq-placeholder.png') }}" alt="">

    </a>
</div>