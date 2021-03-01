<?php

namespace App\Http\Controllers\Vendor;

use App\Models\MenuItem;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;

class MenuController extends BaseVendorController
{
    public function index()
    {
        $user_id = \Auth::guard('vendor')->user()->id;
        $vendor = Vendor::with('user')
            ->whereHas('user', function ($query) use ($user_id) {
            $query->where('id', $user_id);
        })->first();

        return view('vendor.menu.index', ['user' => $vendor]);
    }

    public function show($id)
    {
        $vendor = User::selectVendor($id);
        return view('vendor.menu.show', ['user' => $vendor]);
    }

    public function edit($id)
    {
        $vendor = User::selectVendor($id);
        return view('vendor.menu.edit', ['user' => $vendor]);
    }
}