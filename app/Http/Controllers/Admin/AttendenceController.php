<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class AttendenceController extends Controller
{
    public function AddAttendence()
    {
        $employees  = Employee::get();
        return view('admin.attendences.addattendence',compact('employees'));
    }
}
