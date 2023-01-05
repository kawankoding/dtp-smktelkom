<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return view('students.index', [
            'students' => Student::latest()->get(),
        ]);
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'min:3'],
            'address' => ['required', 'min:10'],
            'phone_number' => ['required', 'numeric'],
            'class' => ['required'],
        ]);

        $student = new Student();

        $photo = null;

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo')->store('photo');
        }

        $student->name = $request->name;
        $student->address = $request->address;
        $student->phone_number = $request->phone_number;
        $student->class = $request->class;
        $student->photo = $photo;

        $student->save();

        session()->flash('success', 'Data Berhasil Ditambahkan.');

        return redirect()->route('students.index');
    }

    public function edit($id)
    {
        $student = Student::find($id);

        return view('students.edit', [
            'student' => $student,
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required', 'min:3'],
            'address' => ['required', 'min:10'],
            'phone_number' => ['required', 'numeric'],
            'class' => ['required'],
        ]);

        $student = Student::find($id);

        $student->name = $request->name;
        $student->address = $request->address;
        $student->phone_number = $request->phone_number;
        $student->class = $request->class;

        $student->save();

        session()->flash('info', 'Data Berhasil Diperbarui.');

        return redirect()->route('students.index');
    }

    public function destroy($id)
    {
        $student = Student::find($id);

        $student->delete();

        session()->flash('danger', 'Data Berhasil Dihapus.');

        return redirect()->route('students.index');
    }
}
