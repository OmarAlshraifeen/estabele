<?php

namespace App\Http\Controllers;

use App\Models\Path;
use App\Models\Stable;
use Illuminate\Http\Request;

class PathController extends Controller
{
    // عرض كل المسارات
    public function index()
    {
        $paths = Path::with('stable')->get();
        return view('paths.index', compact('paths'));
    }

    // عرض صفحة إنشاء مسار
    public function create()
    {
        $stables = Stable::all();
        return view('paths.create', compact('stables'));
    }

    // تخزين المسار الجديد
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'duration_minutes' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
            'stable_id' => 'required|exists:stables,id',
        ]);

        Path::create($validated);

        return redirect()->route('paths.index')->with('success', 'Path created successfully!');
    }

    // عرض صفحة تعديل المسار
    public function edit(Path $path)
    {
        $stables = Stable::all();
        return view('paths.edit', compact('path', 'stables'));
    }

    // تحديث بيانات المسار
    public function update(Request $request, Path $path)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'duration_minutes' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
            'stable_id' => 'required|exists:stables,id',
        ]);

        $path->update($validated);

        return redirect()->route('paths.index')->with('success', 'Path updated successfully!');
    }

    // حذف المسار
    public function destroy(Path $path)
    {
        $path->delete();
        return redirect()->route('paths.index')->with('success', 'Path deleted successfully!');
    }
}
