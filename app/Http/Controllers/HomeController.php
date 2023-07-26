<?php

namespace App\Http\Controllers;

use DateTime;
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
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        
        $duration = (new DateTime($end_date))->diff(new DateTime($start_date))->days;
        
        // Save the duration in the database
      
        EmployeeLeave::create([
            'employee_id' => Auth::user()->id,
            'leave_type' => $request->leave_type,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'reason' => $request->reason,
            'duration'=> $duration,

        ]);
        return back();
    }
    public function page()
    {
        $leave=EmployeeLeave::all();
        return view('employeefolder.page',compact('leave'));
    }
   
 
}
