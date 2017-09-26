<?php

namespace App\Http\Controllers;

use App\Student;
use App\Teacher;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::all();
        return view('home', [
            'teachers' => $teachers
        ]);
    }

    public function new_student(Request $request)
    {
        $request->validate([
            'stu_num' => 'required|numeric|unique:students',
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'area_of_interest' => 'required|string',
            'memo' => 'max:65535',
            'priority_1' => 'nullable|integer|min:1|exists:teachers,id',
            'priority_2' => 'nullable|integer|min:1|exists:teachers,id',
            'priority_3' => 'nullable|integer|min:1|exists:teachers,id',
            'priority_4' => 'nullable|integer|min:1|exists:teachers,id',
            'priority_5' => 'nullable|integer|min:1|exists:teachers,id',
            'priority_6' => 'nullable|integer|min:1|exists:teachers,id',
            'priority_7' => 'nullable|integer|min:1|exists:teachers,id',
        ]);

        $student = new Student;
        $student->firstname = $request->firstname;
        $student->lastname = $request->lastname;
        $student->stu_num = $request->stu_num;
        $student->area_of_interest = $request->area_of_interest;
        $student->memo = $request->memo;
        $student->priorities = [
            $request->priority_1,
            $request->priority_2,
            $request->priority_3,
            $request->priority_4,
            $request->priority_5,
            $request->priority_6,
            $request->priority_7,
        ];
        $student->save();

        return back()->with('status', 'New student added.');
    }
}
