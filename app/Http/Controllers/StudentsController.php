<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $students = (Group::find($id))->students;
        return view('show', compact('students'))->with('id', $id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $group = Group::find($id);
        return view('formStudent', [
            'id' => $id,
            'group' => $group,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $group)
    {
        $student = new Student();
        $student->name = $request->name;
        $student->date_birth = $request->date_birth;
        $student->group_id = $request->group_id;
        $student->save();
        return redirect()->route('students.index', $student->group_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        $subjects = (Student::find($student->id))->subjects;
        return view('showSubjects', compact('subjects'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $group = (Student::find($student->group_id))->group;
        return view('formStudent', [
            'student' => $student,
            'id' => $student->group_id,
            'group' => $group,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $group, $student_id)
    {
        $student = Student::find($student_id);
        $student->update($request->only(['name', 'date_birth']));
        return redirect()->route('students.index', $student->group_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($group, Student $student)
    {
        $student->delete();
        return redirect()->route('students.index', $group);
    }
}
