<div class="col-xs-12 team-tree__level-two team-tree__node-wrapper team-tree__border--left team-tree__border--{{ $sidePlacement  }}-{{ $side }}">
    <a id="dist_id_{{ $node_->id or "" }}" data-id="{{ $node_->id or "" }}"
       href="#" class="team-tree__node {{ $nodeClass }}" data-border="{{ $sidePlacement  }}-{{ $side }}"
       data-toggle="tooltip" data-placement="top" title="{{ ($node_) ? $node_->first_name . " " . $node_->last_name : "" }}"
    >
        <img src="{{ asset('images/sq-placeholder.png') }}" alt="">

    </a>
</div>
