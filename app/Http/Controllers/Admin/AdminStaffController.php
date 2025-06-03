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
            Staff::create($request->validated());
            return redirect()->route('admin.staffs.index')->with('success', '保存しました');
    }

    public function edit(string $id)
    {
        $staff = Staff::findOrFail($id);

        return view('admin.staffs.edit', ['staff' => $staff]);
    }

    public function update(UpdateStaffRequest $request, string $id)
    {
        $Staff = Staff::findOrFail($id);
        $updateDate = $request->validated();

        $Staff->update($updateDate); 

        return to_route('admin.Staffs.index')->with('success', "更新しました");
    }

        public function destroy(string $id)
        {
            $staff = Staff::findOrFail($id);
            $staff->delete();
    
            return to_route('admin.staffs.index')->with('success', "削除しました");
    
        }
}
