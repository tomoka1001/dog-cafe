<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Staff;
use App\Http\Requests\Admin\StoreStaffRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\UpdateStaffRequest;

class AdminStaffController extends Controller
{
    public function index ()
    {
        $staffs = Staff::all();
        return view('admin.staffs.index', compact('staffs'));
    }

    public function create()
    {
        return view('admin.staffs.create');
    }

    public function store(StoreStaffRequest $request)
    {
        $validated = $request->validated();
        $staff = Staff::create($validated);
        return to_route('admin.staffs.index')->with('massege', 'スタッフを登録しました');
    }

    public function edit(string $id)
    {
        $staff = Staff::findOrFail($id);
        return view('admin.staffs.edit', compact('staff'));
    }

    public function update(UpdateStaffRequest $request, string $id)
    {
        $staff = Staff::findOrFail($id);
        $validated = $request->validated(); 
        $staff = Staff::create($validated);
        $staff->update($validated);
        return to_route('admin.staffs.index')->with('massege', "更新しました");
    }

        public function destroy(string $id)
        {
            $staff = Staff::findOrFail($id);
            $staff->delete();
            return to_route('admin.staffs.index')->with('massege', "削除しました");
    
        }
}
