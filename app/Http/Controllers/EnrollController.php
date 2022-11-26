<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\ClassRoom;
use App\Models\EnrollStudent;
use Session;
use Redirect;

class EnrollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Student $student)
    {
        $classes = ClassRoom::all();
        return view('enroll.enroll-student',compact('student','classes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required',
            'class_room_id' => 'required',
        ]);
        $class = ClassRoom::find($request->class_room_id);
        $student = EnrollStudent::where('student_id',$request->student_id)->first();
        $classSeatCout = EnrollStudent::where('class_room_id',$request->class_room_id)->count();
        if($classSeatCout >= $class->seat) {
            Session::flash('message', 'Seats are already full'); 
            return Redirect::back();
        }
        if($student) {
            Session::flash('message', 'Student already Enrolled'); 
            return Redirect::back();
        }
        EnrollStudent::create($validated);
        Session::flash('message', 'Successfully enroll the student'); 
        return redirect()->route('home');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = EnrollStudent::where('student_id',$id)->first();
        if(!$student) {
            Session::flash('message', 'You have to enroll the student first!'); 
            return Redirect::back();
        }
        EnrollStudent::where('student_id',$id)->delete();
        Session::flash('message', 'Successfully Unenroll the student'); 
        return Redirect::back();
    }
}
