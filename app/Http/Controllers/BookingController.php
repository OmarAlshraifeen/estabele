<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use App\Models\Horse;
use App\Models\Path;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    // عرض كل الحجوزات
    public function index()
    {
        $bookings = Booking::with(['user', 'horse', 'path'])->get();
        return view('bookings.index', compact('bookings'));
    }

    // عرض صفحة إنشاء حجز
    public function create()
    {
        $users = User::all();
        $horses = Horse::all();
        $paths = Path::all();
        return view('bookings.create', compact('users', 'horses', 'paths'));
    }

    // حفظ الحجز الجديد
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'horse_id' => 'required|exists:horses,id',
            'path_id' => 'required|exists:paths,id',
            'start_time' => 'required|date',
            'status' => 'required|in:pending,confirmed,cancelled',
        ]);

        Booking::create($validated);

        return redirect()->route('bookings.index')->with('success', 'Booking created successfully!');
    }

    // عرض صفحة التعديل
    public function edit(Booking $booking)
    {
        $users = User::all();
        $horses = Horse::all();
        $paths = Path::all();
        return view('bookings.edit', compact('booking', 'users', 'horses', 'paths'));
    }

    // تحديث بيانات الحجز
    public function update(Request $request, Booking $booking)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'horse_id' => 'required|exists:horses,id',
            'path_id' => 'required|exists:paths,id',
            'start_time' => 'required|date',
            'status' => 'required|in:pending,confirmed,cancelled',
        ]);

        $booking->update($validated);

        return redirect()->route('bookings.index')->with('success', 'Booking updated successfully!');
    }

    // حذف الحجز
    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->route('bookings.index')->with('success', 'Booking deleted successfully!');
    }
}
