<?php

namespace App\Http\Controllers;

use App\Services\UserHealthActionItemDaysServices;
use App\Services\UserHealthActionItemsServices;
use App\Services\UserHealthActionsServices;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class UserHealthActionItemsController extends Controller
{
    /**
     * @var UserHealthActionItemsServices
     */
    private $userHealthActionItemsServices;
    /**
     * @var UserHealthActionsServices
     */
    private $userHealthActionsServices;
    /**
     * @var UserHealthActionItemDaysServices
     */
    private $userHealthActionItemDaysServices;

    /**
     * UserHealthActionItemsController constructor.
     * @param UserHealthActionItemsServices $userHealthActionItemsServices
     * @param UserHealthActionsServices $userHealthActionsServices
     * @param UserHealthActionItemDaysServices $userHealthActionItemDaysServices
     * @internal param UserHealthActionItemsServices $services
     */
    public function __construct(
        UserHealthActionItemsServices $userHealthActionItemsServices,
        UserHealthActionsServices $userHealthActionsServices,
        UserHealthActionItemDaysServices $userHealthActionItemDaysServices
    )
    {
        $this->userHealthActionItemsServices = $userHealthActionItemsServices;
        $this->userHealthActionsServices = $userHealthActionsServices;
        $this->userHealthActionItemDaysServices = $userHealthActionItemDaysServices;
    }

    public function setItem(Request $request)
    {
        DB::beginTransaction();
        try {
            $userAction = $this->userHealthActionsServices->findByArray([
                'week' => Carbon::parse($request->input('date')),
                'category_id' => $request->input('category_id'),
            ]);

            if (!$userAction) {
                $userAction = $this->userHealthActionsServices->create([
                    'user_id' => Auth::user()->id,
                    'week' => Carbon::parse($request->input('date')),
                    'category_id' => $request->input('category_id'),
                ]);
            }

            $userHealthActionItem = $this->userHealthActionItemsServices->create([
                'health_action_id' => $userAction->id,
                'title' => $request->input('title'),
            ]);

            foreach ($request->input('day') as $day) {
                $this->userHealthActionItemDaysServices->create([
                    'uhai_id' => $userHealthActionItem->id,
                    'day' => $day,
                ]);
            }

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();

            throw $exception;
        }

        return response(['message' => 'created']);
    }

    public function cloneItems(Request $request)
    {
        $userHealthAction = $this->userHealthActionsServices->findByArray([
            'week' => Carbon::parse($request->input('date')),
            'category_id' => $request->input('category_id'),
        ]);

        if (!$userHealthAction) {
            $userHealthAction = $this->userHealthActionsServices->create([
                'user_id' => Auth::user()->id,
                'week' => Carbon::parse($request->input('date')),
                'category_id' => $request->input('category_id'),
            ]);
        }
        DB::beginTransaction();
        try {
            foreach ($request->healthActionItemIds as $healthActionItemId) {
                $userHealthActionItem = $this->userHealthActionItemsServices->find($healthActionItemId);

                if ($userHealthActionItem) {
                    $_userHealthActionItem = $userHealthActionItem->replicate();
                    $_userHealthActionItem->health_action_id = $userHealthAction->id;
                    $_userHealthActionItem->save();

                    foreach ($userHealthActionItem->days as $day) {
                        $_day = $day->replicate();
                        $_day->uhai_id = $_userHealthActionItem->id;
                        $_day->is_complete = 0;
                        $_day->save();
                    }
                }


            }

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();

            throw $exception;
        }
        return response(['message' => 'cloned']);
    }

    public function updateItem(Request $request)
    {
        DB::beginTransaction();
        try {
            $this->userHealthActionItemsServices->update([
                'day' => $request->input('day'),
            ], $request->input('id'));

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();

            throw $exception;
        }

        return response(['message' => 'updated']);
    }

    public function deleteItem(Request $request)
    {
        DB::beginTransaction();
        try {

            $item = $this->userHealthActionItemsServices->find($request->input('id'));
            $userHealthAction = $item->healthAction;

            $this->userHealthActionItemsServices->delete($item->id);

            if ($userHealthAction->items->count() < 1) {
                $userHealthAction->delete();
            }

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();

            throw $exception;
        }

        return response(['message' => 'deleted']);
    }
}
