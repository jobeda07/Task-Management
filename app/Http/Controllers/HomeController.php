<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployeeLeave;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
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
    public function createshowfront()
    {
        return view('layouts.createshow');
    }
}
