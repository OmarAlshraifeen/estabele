<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // عرض كل الإدمنز
    public function index()
    {
        $admins = Admin::all();
        return view('admins.index', compact('admins'));
    }

    // عرض صفحة إنشاء إدمن جديد
    public function create()
    {
        return view('admins.create');
    }

    // حفظ الإدمن الجديد
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|string|min:6',
        ]);

        $validated['password'] = Hash::make($validated['password']);

        Admin::create($validated);

        return redirect()->route('admins.index')->with('success', 'Admin created successfully!');
    }

    // عرض صفحة التعديل
    public function edit(Admin $admin)
    {
        return view('admins.edit', compact('admin'));
    }

    // تحديث بيانات الإدمن
    public function update(Request $request, Admin $admin)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email,' . $admin->id,
            'password' => 'nullable|string|min:6',
        ]);

        if ($request->filled('password')) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']); // لا تحدث الباسورد إذا ما تم إدخاله
        }

        $admin->update($validated);

        return redirect()->route('admins.index')->with('success', 'Admin updated successfully!');
    }

    // حذف الإدمن
    public function destroy(Admin $admin)
    {
        $admin->delete();
        return redirect()->route('admins.index')->with('success', 'Admin deleted successfully!');
    }
}
