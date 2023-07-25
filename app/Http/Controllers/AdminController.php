<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('backend.dashboard');
    }
    public function createshow(){
        return view('backend.employee.createshow');
    }
}
