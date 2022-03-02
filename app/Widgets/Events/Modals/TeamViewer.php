<?php

namespace App\Widgets\Events\Modals;

use App\Services\TreeDetailsServices;
use App\Services\UsersServices;
use Arrilot\Widgets\AbstractWidget;

class TeamViewer extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [
        'user_id' => null
    ];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run(UsersServices $usersServices, TreeDetailsServices $treeDetailsServices)
    {
        $data = $this->config;
        $data['user'] = $usersServices->showUser($data['user_id']);
        $data['sponsors']  = $data['user']['sponsors'];
        $data['tl']  = ($data['sponsors']) ? $data['sponsors']['tl'] : null;
        $data['stl']  = ($data['sponsors']) ? $data['sponsors']['stl'] : null;
        $data['ctl']  = ($data['sponsors']) ? $data['sponsors']['ctl'] : null;

        $user = $usersServices->find($data['user_id']);
        $getTrees = $treeDetailsServices->getTreesByUserId($user);
        $trees = $getTrees['treeViews'];
        $firstLeft = array_shift($trees['L']);
        $firstRight = array_shift($trees['R']);
        $data['user'] = $user;
        $data['trees'] = $trees;
        $data['user_node_class'] = $getTrees['userNodeClass'];
        $data['firstLeft'] = $firstLeft;
        $data['firstRight'] = $firstRight;
        $data['parent_distributor'] = $usersServices->getParentDistributor($user->id);
        $data['grand_parent_distributor'] = null;

        if ($data['parent_distributor']) {
            $data['grand_parent_distributor'] = $usersServices->getParentDistributor($data['parent_distributor']->id);
        }

        return view('widgets.events.modals.team_viewer', $data);
    }
}
