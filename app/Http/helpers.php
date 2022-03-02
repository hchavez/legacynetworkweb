<?php

function formatSuccessCompassDate($date)
{
    if ($date) {
        return $date->format('m/d/Y');
    }

    return null;
}

/** @return \App\User */
function user()
{
    if (Auth::check()) {
        return Auth::user();
    }

    throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException("User Not Found");
}

function carbonNow()
{
    return \Illuminate\Support\Carbon::now();
}

function ddd($data)
{
    echo '<pre>';
    print_r($data);
    echo '</pre>';
    die;
}

function log_($data)
{
    \Illuminate\Support\Facades\Log::info($data);
}

function getTreeNodeClass($mainTree, $nodeId)
{
    $now = \Carbon\Carbon::now();
    $downLineCount = $mainTree->where('referrer_id', $nodeId)->count();

    if ($downLineCount == 2) {
        return 'team-tree__node--full';
    } else {
        $user = $mainTree->where('id', $nodeId)->first();
        $diffInDays = $now->diffInDays(\Carbon\Carbon::parse($user->created_at));
        if ($diffInDays <= 14) {
            return 'team-tree__node--half-yellow';
        }
    }

    return 'team-tree__node--half';
}

function formatTreeNodeIds($treeSide)
{
    $idArr = [];

    foreach ($treeSide as $treeSideNode) {
        $idArr[] = $treeSideNode['id'];
    }

    $idArr = array_reverse($idArr);

    return "[" . implode(',',$idArr) . "]";
}

function generateTreeNodeItem($mainTree, $parentNodeId, array $sideArrangement, $sidePlacement = '')
{
    $sideArr = ['R' => 'right', 'L' => 'left'];
    $sideArrangementCount = count($sideArrangement);

    $nodeClass = null;
    $node_ = null;
    $placement = $sideArrangement[$sideArrangementCount - 1];

    for ($ctr = 0; $ctr < $sideArrangementCount; $ctr++) {
        if ($parentNodeId) {
            $node_ = $mainTree->where('referrer_id', $parentNodeId)->where('placement', $sideArrangement[$ctr])->first();
            if ($node_) {
                $parentNodeId = $node_->id;
            } else {
                $parentNodeId = null;
            }
        } else {
            break;
        }
    }

    if ($ctr != $sideArrangementCount) {
        // was not able to traverse upwards
        $nodeClass = null;
        $node_ = null;
    }

    if ($node_) {
        $nodeClass = getTreeNodeClass($mainTree, $node_->id);
    }

    $params = [
        'node_' => $node_,
        'side' => $sideArr[$placement],
        'nodeClass' => $nodeClass,
        'sidePlacement' => $sidePlacement,
    ];

    $levelViewArray = [
        1 => 'treeLevelTwo',
        2 => 'treeLevelThree',
        3 => 'treeLevelFour',
    ];

    return view('widgets.' . $levelViewArray[$sideArrangementCount], $params)->render();
}

function assignRole(\App\User $user, $roleName)
{
    if ($user->hasRole($roleName) == false) {
        $user->assignRole($roleName);
    }
}

function initials($string)
{
    $output = null;
    $token = strtok($string, ' ');
    while ($token !== false) {
        $output .= $token[0];
        $token = strtok(' ');
    }
    return $output;
}

function bannerConfig($template = 1)
{
    $bannerLinks = [];

    if (session()->get('nav_type', 'elite_challenge') == 'elite_challenge') {
        $template = 1;
        $bannerLinks['home'] = [
            'url' => url('/'),
            'label' => 'home'
        ];
        $bannerLinks['products'] = [
            'url' => url('products'),
            'label' => 'products'
        ];
        if (session()->has('purl_user')) {
            $bannerLinks['buy_products'] = [
                'url' => url('buy_products'),
                'label' => 'buy products'
            ];
        }
        $bannerLinks['live_broadcast'] = [
            'url' => url('live-broadcast'),
            'label' => 'live broadcast'
        ];
        $bannerLinks['calendar'] = [
            'url' => url('ehc-calendar'),
            'label' => 'calendar'
        ];
        $bannerLinks['contact'] = [
            'url' => url('ehc-contact'),
            'label' => 'contact'
        ];
        $bannerLinks['business'] = [
            'url' => url('business'),
            'label' => 'business'
        ];
    } else {
        $template = 2;
        $bannerLinks['home'] = [
            'url' => url('/business'),
            'label' => 'home'
        ];
        $bannerLinks['products'] = [
            'url' => url('products'),
            'label' => 'products'
        ];
        if (session()->has('purl_user')) {
            $bannerLinks['buy_products'] = [
                'url' => url('buy_products'),
                'label' => 'buy products'
            ];
        }
        $bannerLinks['live_broadcast'] = [
            'url' => url('live-broadcast'),
            'label' => 'live broadcast'
        ];
        $bannerLinks['calendar'] = [
            'url' => url('guest-calendar'),
            'label' => 'calendar'
        ];
        $bannerLinks['legacy'] = [
            'url' => url('leave-a-legacy'),
            'label' => 'legacy'
        ];
        $bannerLinks['blog'] = [
            'url' => 'https://blog.legacynetwork.com',
            'label' => 'blog',
            'target' => '_blank'
        ];
        $bannerLinks['contact'] = [
            'url' => url('contact'),
            'label' => 'contact'
        ];
    }

    if ($template === 1) {
        return (object)[
            'bannerLinks' => $bannerLinks,
            'subTitle' => 'WELCOME TO THE',
            'title' => '',
            'info' => '',
            'actionText' => 'Start Now',
            'actionLink' => url('elite_challenge/step/1'),
            'showBanner' => true,
            'faded' => true,
        ];
    } else if ($template === 2) {
        return (object)[
            'bannerLinks' => $bannerLinks,
            'subTitle' => 'WELCOME TO THE',
            'title' => '',
            'info' => '',
            'actionText' => 'Get Started',
            'actionLink' => url('get-started/step/0'),
            'showBanner' => true,
            'faded' => false,
        ];
    }

    // fallback
    return (object)[
        'bannerLinks' => $bannerLinks,
        'subTitle' => 'WELCOME TO THE',
        'title' => '',
        'info' => '',
        'actionText' => 'Get Started',
        'actionLink' => url('get-started/step/0'),
        'showBanner' => true,
        'faded' => true,
    ];
}