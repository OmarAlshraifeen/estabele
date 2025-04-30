<?php

namespace App\Http\Controllers;

use App\Models\Horse;
use App\Models\Stable;
use Illuminate\Http\Request;

class HorseController extends Controller
{
    // عرض كل الخيول
    public function index()
    {
        $horses = Horse::with('stable')->get();
        return view('Layouts_dashboard.horses.index', compact('horses'));
    }

    // عرض صفحة إنشاء خيل جديد
    public function create()
    {
        $stables = Stable::all();
        return view('horses.create', compact('stables'));
    }

    // تخزين الخيل الجديد
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'stable_id' => 'required|exists:stables,id',
        ]);

        Horse::create($validated);

        return redirect()->route('Layouts_dashboard.horses.index')->with('success', 'Horse created successfully!');
    }

    // عرض صفحة تعديل خيل
    public function edit(Horse $horse)
    {
        $stables = Stable::all();
        return view('horses.edit', compact('horse', 'stables'));
    }

    // تحديث بيانات الخيل
    public function update(Request $request, Horse $horse)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'stable_id' => 'required|exists:stables,id',
        ]);

        $horse->update($validated);

        return redirect()->route('Layouts_dashboard.horses.index')->with('success', 'Horse updated successfully!');
    }

    // حذف الخيل
    public function destroy(Horse $horse)
    {
        $horse->delete();
        return redirect()->route('Layouts_dashboard.horses.index')->with('success', 'Horse deleted successfully!');
    }
}
