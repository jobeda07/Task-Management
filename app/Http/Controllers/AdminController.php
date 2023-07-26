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
  
    public function createshow()
    {
        $leave=EmployeeLeave::all();
        return view('backend.employee.createshow',compact('leave'));
    }
    public function employee_create()
    {
        return view('backend.employee.create');
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
         $employee = User::where('role', '0')->get();
        return view('backend.employee.employeeList',compact('employee'));
    }
  
}
