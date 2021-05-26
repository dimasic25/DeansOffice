<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($group, $student)
    {
        $subjects = (Student::find($student))->subjects;
        return view('showSubjects', [
            'subjects' => $subjects,
            'group' => $group,
            'student' => $student,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($group, $student)
    {
        return view('formSubject', [
            'group' => $group,
            'student' => $student,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store($group, $student, Request $request)
    {
        $subject = new Subject();
        $subject->name = $request->name;
        $subject->mark = $request->mark;
        $student = Student::find($student);
        $subject->save();
        $student->subjects()->save($subject);
        return redirect()->route('subjects.index', [
            'group' => $group,
            'student' => $student->id,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Subject $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Subject $subject
     * @return \Illuminate\Http\Response
     */
    public function edit($group, $student, Subject $subject)
    {
        return view('formSubject', [
            'subject' => $subject,
            'group' => $group,
            'student' => $student,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Subject $subject
     * @return \Illuminate\Http\Response
     */
    public function update($group, $student, Request $request, Subject $subject)
    {
        $subject->update($request->only(['name', 'mark']));
        return redirect()->route('subjects.index', [
            'group' => $group,
            'student' => $student,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Subject $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy($group, $student, Subject $subject)
    {
//        $student = Student::find($student);
//        $student->subjects()->detach($subject);
        $students = $subject->students;
        foreach ($students as $note) {
            $subject->students()->detach($note);
        }
        $subject->delete();
        return redirect()->route('subjects.index', [
            'group' => $group,
            'student' => $student,
        ]);
    }

    public function sort($group, $student,$order) {
        $subjects = (Student::find($student))->subjects;
        $subjects = collect($subjects);
        if ($order == 1) {
            $subjects = $subjects->sortBy('name')->values()->all();
        }
        else if ($order == 2) {
            $subjects = $subjects->sortBy('mark')->values()->all();
        }
        else {
            $subjects = $subjects->sortBy('id')->values()->all();
        }
        return view('showSubjects', [
            'subjects' => $subjects,
            'group' => $group,
            'student' => $student,
        ]);
    }
}
