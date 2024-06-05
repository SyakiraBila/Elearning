<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //methode untuk menampilkan data student
    public function index()
    {
        //tarik data student dari database
        $students = Student::all();

        //panggil view dan kirim data students
        return view('admin.contents.Student.index', [
            'students' => $students,
        ]);
    }

    //methode untuk menampilkan tambah student
    public function create()
    {
        //mendapatkan data courses
        $courses = Course::all();
        return view('admin.contents.Student.create', [
            'courses' => $courses,
        ]);
    }
    // methode untuk menyimpan data student baru
    public function store(Request $request)
    {
        // validasi data yang diterima
        $request->validate([
            'name' => 'required',
            'nim' => 'required|numeric',
            'major' => 'required',
            'class' => 'required',
            'courses_id' => 'nullable',

        ]);

        //simpan data ke db
        Student::create([
            'name' => $request->name,
            'nim' => $request->nim,
            'major' => $request->major,
            'class' => $request->class,
            'courses_id' => $request->course_id,

        ]);

        return redirect('admin/Student')->with('message', 'Data student berhasil ditambahkan!');
    }
    //method utk menampilkan halaman edit
    public function edit($id)
    {
        //cari data student berdasarkan id
        $student = Student::find($id); // select * FROM students WHERE id = $id;

        return view('admin.contents.Student.edit', [
            'student' => $student
        ]);
    }

    //method utk menyimpan hasil update
    public function update($id, Request $request)
    {
        //cari data student berdasarkan id
        $student = Student::find($id); // select * FROM students WHERE id = $id;

        //validasi data yg diterima
        $request->validate([
            'name' => 'required',
            'nim' => 'required|numeric',
            'major' => 'required',
            'class' => 'required',
        ]);

        //simpan perubahan
        $student->update([
            'name' => $request->name,
            'nim' => $request->nim,
            'major' => $request->major,
            'class' => $request->class,
        ]);

        //kembalikan ke halaman student
        return redirect('/admin/Student')->with('message', 'Data student berhasil diedit!');
    }

    //method utk menghapus student
    public function destroy($id)
    {
        //cari data student berdasarkan id
        $student = Student::find($id); // select * FROM students WHERE id = $id;

        //hapus student
        $student->delete();

        //kembalikan ke halaman student
        return redirect('/admin/Student')->with('message', 'Data student berhasil dihapus!');
    }
}
