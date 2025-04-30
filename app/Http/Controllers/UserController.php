<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // عرض جميع المستخدمين
    public function index()
    {
        $users = User::all();
        return view('Layouts_dashboard.users.index', compact('users'));
    }

    // عرض صفحة إنشاء مستخدم جديد
    public function create()
    {
        return view('users.create');
    }

    // حفظ المستخدم الجديد
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);

        return redirect()->route('Layouts_dashboard.users.index')->with('success', 'User created successfully!');
    }

    // عرض صفحة التعديل
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    // تحديث بيانات المستخدم
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6',
        ]);

        if ($request->filled('password')) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']); // لا تغير الباسورد إذا ما دخل جديد
        }

        $user->update($validated);

        return redirect()->route('Layouts_dashboard.users.index')->with('success', 'User updated successfully!');
    }

    // حذف المستخدم
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('Layouts_dashboard.users.index')->with('success', 'User deleted successfully!');
    }
}
