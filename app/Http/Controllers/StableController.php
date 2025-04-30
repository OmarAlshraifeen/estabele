<?php

namespace App\Http\Controllers;

use App\Models\Stable;
use App\Models\Admin;
use Illuminate\Http\Request;

class StableController extends Controller
{
    // عرض جميع الاسطبلات
    public function index()
    {
        $stables = Stable::with('admin')->get();
        return view('Layouts_dashboard.stables.index', compact('stables'));
    }

    // عرض نموذج إنشاء اسطبل
    public function create()
    {
        $admins = Admin::all();
        return view('stables.create', compact('admins'));
    }

    // تخزين الاسطبل الجديد
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string',
            'admin_id' => 'required|exists:admins,id',
        ]);

        Stable::create($validated);

        return redirect()->route('Layouts_dashboard.stables.index')->with('success', 'Stable created successfully!');
    }

    // عرض نموذج التعديل
    public function edit(Stable $stable)
    {
        $admins = Admin::all();
        return view('stables.edit', compact('stable', 'admins'));
    }

    // تحديث بيانات الاسطبل
    public function update(Request $request, Stable $stable)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string',
            'admin_id' => 'required|exists:admins,id',
        ]);

        $stable->update($validated);

        return redirect()->route('Layouts_dashboard.stables.index')->with('success', 'Stable updated successfully!');
    }

    // حذف الاسطبل
    public function destroy(Stable $stable)
    {
        $stable->delete();
        return redirect()->route('Layouts_dashboard.stables.index')->with('success', 'Stable deleted successfully!');
    }
}
