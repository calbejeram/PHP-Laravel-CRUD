<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Students::all();
        return view('list', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $storeData = $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required|email',
            'age'=>'required|numeric',
            'address'=>'required|max:255',
            'birthday'=>'required|date',
            'gender'=>'required'
        ]);

        Students::create($storeData);
        return redirect()->route('list')->with('success', 'Student created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Students::find($id);
        return view('show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Students::find($id);
        return view('edit', [
            'student' => $student
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student = Students::find($id);
        $storeData = $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            // 'email'=>'required|unique:students,email',
            'age'=>'required|numeric',
            'address'=>'required|max:255',
            'birthday'=>'required|date',
            'gender'=>'required'
        ]);

        Students::where('id', $id)->update($storeData);
        return redirect()->route('list')->with('success', "Student '$student->email' Updated Successfully!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Students::find($id);
        Students::where('id', $id)->delete($student);
        return redirect()->route('list')->with('success', "Student '$student->email' Deleted Successfully!");
    }
}
