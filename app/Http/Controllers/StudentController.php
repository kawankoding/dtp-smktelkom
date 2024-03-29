<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudentClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        return view('students.create', [
            'classes' => StudentClass::get(),
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'min:3'],
            'address' => ['required', 'min:10'],
            'phone_number' => ['required', 'numeric'],
        ]);

        $student = new Student();

        $photo = null;

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo')->store('photo');
        }

        $student->name = $request->name;
        $student->address = $request->address;
        $student->phone_number = $request->phone_number;
        $student->student_class_id = $request->student_class_id;
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
            'classes' => StudentClass::get(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required', 'min:3'],
            'address' => ['required', 'min:10'],
            'phone_number' => ['required', 'numeric'],
        ]);

        $student = Student::find($id);

        $photo = $student->photo;

        if ($request->hasFile('photo')) {
            if ($photo != null) {
                if (Storage::exists($photo)) {
                    Storage::delete($photo);
                }
            }
            $photo = $request->file('photo')->store('photo');
        }

        $student->name = $request->name;
        $student->address = $request->address;
        $student->phone_number = $request->phone_number;
        $student->student_class_id = $request->student_class_id;
        $student->photo = $photo;

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
