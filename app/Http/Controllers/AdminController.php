<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\EmployeeLeave;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('backend.dashboard');
    }
    public function createshowfront()
    {
        return view('layouts.createshow');
    }
    public function createshow()
    {
        return view('backend.employee.createshow');
    }
    public function employee_create()
    {
        return view('employee');
    }
    public function employee_create_post(Request $request)
    {
        $request->validate([

            'name' => 'required',
            'employee_id' => 'required',
            'phone' => 'required',
        ]);
        $fileName = null;
        if ($request->hasFile('image')) {
            $fileName = date('Ymdhmsis') . '.' . $request->file('image')->getclientOriginalExtension();
            $request->file('image')->storeAs('/up', $fileName);
        }
        User::create([
            'name' => $request->name,
            'employee_id' => $request->employee_id,
            'email' => $request->email,
            'phone' => $request->phone,
            'image' => $fileName,
            'password' => bcrypt(12345),

        ]);
    }
    public function employee_list()
    {
        $user = User::where('role', '0');
        return view('backend.employee.createshow');
    }
    public function employee_leave(Request $request)
    {
        $request->validate([

            'leave_type' => 'required',
            'start_date' => 'required',
        ]);
        EmployeeLeave::create([
            'employee_id' => Auth::user()->id,
            'leave_type' => $request->leave_type,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'reason' => $request->reason,

        ]);
        return back();
    }
}
