<?php

namespace App\Widgets;

use App\Repositories\TreeDetailsRepository;
use Arrilot\Widgets\AbstractWidget;

class Tree extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [
        'user_id' => null,
        'placement' => null,
        'tree_id' => null,
    ];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     * @param TreeDetailsRepository $treeDetailsRepository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function run(TreeDetailsRepository $treeDetailsRepository)
    {
        $data = $this->config;
        $data['tree'] = $treeDetailsRepository->getTreeDetailsByTreeId($this->config['tree_id']);
//        dd($data['tree']);
        return view('widgets.tree', $data);
    }
}
