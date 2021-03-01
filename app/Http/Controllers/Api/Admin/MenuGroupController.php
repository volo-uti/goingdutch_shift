<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Resources\Admin\MenuGroupResource;
use App\Http\Resources\Admin\MenuItemResource;
use App\Models\MenuGroup;
use Illuminate\Http\Request;

class MenuGroupController extends BaseApiController
{
    public function index(Request $request, $vendor_id)
    {
        try {
            $page       = $request->page;
            $per_page   = $request->per_page;

            $groups = MenuGroup::withTrashed()
                ->where('vendor_id', $vendor_id)
                ->where(function ($query) use ($request) {

                    if (!empty($request->search_text)) {
                        $query->where('title', 'like', "%{$request->search_text}%");
                    }

                    if (!empty($request->start_date)) {
                        $query->whereDate('created_at', '>=', $request->start_date);
                    }

                    if (!empty($request->end_date)) {
                        $query->whereDate('created_at', '<=', $request->end_date);
                    }
                })
                ->orderByDesc('id')
                ->paginate($per_page, ['*'], 'page', $page);

            return MenuGroupResource::collection($groups);

        } catch (\Exception $e) {
            $code = $e->getCode();
            $msg = $e->getMessage();
        }

        return response($msg, $code);
    }

    public function store()
    {
    }

    public function show(Request $request, $vendor_id, $group_id)
    {
        try {
            $group = MenuGroup::withTrashed()
                ->where('vendor_id', $vendor_id)
                ->where('id', $group_id)
                ->firstOrFail();

            return new MenuGroupResource($group);

        } catch (\Exception $e) {
            $code = $e->getCode();
            $msg = $e->getMessage();
        }

        return response($msg, $code);
    }

    public function update(Request $request, $vendor_id, $menu_id)
    {
        try {
            $menu = MenuGroup::updateItem($menu_id, $request);
            if ($menu) {
                return new MenuGroupResource($menu);
            }

            return response()->json(['msg' => 'no content'], 202);

        } catch (\Exception $e) {
            $code = $e->getCode();
            $msg = $e->getMessage();
        }

        return response()->json(['code' => $code, 'msg' => $msg], $code);
    }

    public function destroy($vendor_id, $menu_id)
    {
        try {
            $menu = MenuGroup::deleteItem($menu_id);
            if ($menu) {
                return new MenuGroupResource($menu);
            }

            return response()->json(['msg' => $menu_id], 202);

        } catch (\Exception $e) {
            $code = $e->getCode();
            $msg = $e->getMessage();
        }

        return response()->json(['code' => $code, 'msg' => $msg], $code);
    }

    public function active(Request $request, $vendor_id, $menu_id)
    {
        try {
            $active =  $request->active == "true" ? 1 : 0;

            $group = MenuGroup::withTrashed()
                ->where('vendor_id', $vendor_id)
                ->where('id', $menu_id)
                ->firstOrFail();

            if ($group) {
                $group->active = $active;
                $group->save();
            }

            return new MenuGroupResource($group);

        } catch (\Exception $e) {
            $code = $e->getCode();
            $msg = $e->getMessage();
        }

        return response($msg, $code);
    }

    public function recovery(Request $request)
    {
        try {
            $id     = $request->id;

            $menu = MenuGroup::recoveryItem($id);
            if ($menu) {
                return new MenuGroupResource($menu);
            }

            return response()->json(['msg' => 'no content'], 202);

        } catch (\Exception $e) {
            $code = $e->getCode();
            $msg = $e->getMessage();
        }

        return response()->json(['code' => $code, 'msg' => $msg], $code);
    }
}