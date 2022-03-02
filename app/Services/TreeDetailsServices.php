<?php

namespace App\Services;

use App\LegacyNetwork\Repositories\Services\Services;
use App\Repositories\TreeDetailsRepository;
use App\User;
use Illuminate\Support\Collection;


class TreeDetailsServices extends Services
{
    /** @var TreeDetailsRepository  */
    protected $repository;

    function repository()
    {
        return TreeDetailsRepository::class;
    }

    public function getTreesByUserId(User $user)
    {
        /** @var Collection $mainTree */
        $user_id = $user->id;
        $untouchedMainTree = $mainTree = collect($this->repository->getTreeByUserId($user_id));
        $mainTree = $this->_removeDuplicatesOnDownLine($mainTree, $user_id);
        $directChildren = $this->_detachDirectChildren($mainTree, $user_id);
        $directChildren = $this->_sortBothSides($untouchedMainTree, $directChildren);
        $treeViews = $this->_generateTreeViews($mainTree, $directChildren);
        $userNodeClass = $this->generateUserNodeClass($untouchedMainTree, $user);

        return [
            'treeViews' => $treeViews,
            'userNodeClass' => $userNodeClass,
            'directChildren' => $directChildren
        ];
    }

    private function _detachDirectChildren(Collection $mainTree, $user_id)
    {
        $res = $mainTree->filter(function ($item) use ($user_id) {
            return $item->referrer_id == $user_id;
        });

        $res = $res->groupBy('placement');

        return $res;
    }

    private function _sortBothSides(Collection $untouchedMainTree, Collection $directChildren)
    {
        /** @var Collection $sides */
        foreach ($directChildren as $sides) {
            foreach ($sides as $treeNode) {
                $treeNode->score = $this->_getNodeScore($untouchedMainTree, $treeNode->id);
            }
        }

        $directChildren['L'] = (isset($directChildren['L'])) ? $directChildren['L']->sortByDesc('sort_value') : collect([]);
        $directChildren['R'] = (isset($directChildren['R'])) ? $directChildren['R']->sortByDesc('sort_value') : collect([]);

        return $directChildren;
    }

    private function _generateTreeViews(Collection $mainTree, Collection $directChildren)
    {
        $data['L'] = [];
        $data['R'] = [];

        foreach ($directChildren['L'] as $node) {
            $data['L'][] = [
                'id' => $node->id,
                'treeHtml' => view('widgets.tree', [
                    'mainTree' => $mainTree,
                    'node' => $node,
                    'sidePlacement' => 'left',
                    'nodeCount' => $node->score,
                ])->render()
            ];
        }

        foreach ($directChildren['R'] as $node) {
            $data['R'][] = [
                'id' => $node->id,
                'treeHtml' => view('widgets.tree', [
                    'mainTree' => $mainTree,
                    'node' => $node,
                    'sidePlacement' => 'right',
                    'nodeCount' => $node->score,
                ])->render()
            ];
        }

        //put empty tree view if no items
        if (empty($data['R'])) {
            $data['R'][] = [
                'id' => null,
                'treeHtml' => view('widgets.emptyTree', [
                    'sidePlacement' => 'right'
                ])->render()
            ];
        }
        if (empty($data['L'])) {
            $data['L'][] = [
                'id' => null,
                'treeHtml' => view('widgets.emptyTree', [
                    'sidePlacement' => 'left'
                ])->render()
            ];
        }
        return $data;
    }

    private function _removeDuplicatesOnDownLine(Collection $mainTree, $user_id)
    {
        $_mainTree = $mainTree; //intact mainTree
        $sides = $mainTree->groupBy('placement');

        /** @var Collection $side */
        foreach ($sides as $sac => $side) {
            $referrerIdCollection = $side->groupBy('referrer_id');
            /** @var Collection $val */

            foreach ($referrerIdCollection as $key => $val) {
                if ($key != $user_id) {
                    foreach ($val as $x) {
                        $x->score = $this->_getNodeScore($_mainTree, $x->id);
                    }
                    /** @var Collection $sorted */

                    $sorted = $val->sortBy('score');
                    $sorted->pop();

                    foreach ($sorted as $toRejectItem) {
                        $mainTree = $mainTree->reject(function ($element) use($toRejectItem) {
                            return $element->id == $toRejectItem->id;
                        });
                    }
                }
            }
        }

        return $mainTree;
    }

    private function _getNodeScore(Collection $_mainTree, $itemId)
    {
        return $_mainTree->where('referrer_id', $itemId)->count();
    }

    private function generateUserNodeClass($untouchedMainTree, $user)
    {
        $leftCount = $untouchedMainTree->where('referrer_id', $user->id)->where('placement', 'L')->count();
        $rightCount = $untouchedMainTree->where('referrer_id', $user->id)->where('placement', 'R')->count();
        $now = \Carbon\Carbon::now();

        if ($leftCount > 0 && $rightCount > 0) {
            return 'team-tree__node--full';
        } else {
            $diffInDays = $now->diffInDays(\Carbon\Carbon::parse($user->created_at));
            if ($diffInDays <= 14) {
                return 'team-tree__node--half-yellow';
            }
        }
        return 'team-tree__node--half';
    }

}
