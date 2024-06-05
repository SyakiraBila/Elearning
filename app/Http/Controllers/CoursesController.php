<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Courses;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    //methode untuk menampilkan data student
    public function index()
    {
        //tarik data student dari database
        $courses = Course::all();

        //panggil view dan kirim data students
        return view('admin.contents.courses.index', [
            'courses' => $courses,
        ]);
    }

    //methode untuk menampilkan tambah student
    public function create()
    {
        return view('admin.contents.courses.create');
    }
    // methode untuk menyimpan data student baru
    public function store(Request $request)
    {
        // validasi data yang diterima
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'desc' => 'required',
        ]);

        //simpan data ke db
        Course::create([
            'name' => $request->name,
            'category' => $request->category,
            'desc' => $request->desc,
        ]);

        return redirect('admin/courses')->with('message', 'Data student berhasil ditambahkan!');
    }
    //method utk menampilkan halaman edit
    public function edit($id)
    {
        //cari data student berdasarkan id
        $course = Course::find($id); // select * FROM courses WHERE id = $id;

        return view('admin.contents.courses.edit', [
            'course' => $course
        ]);
    }

    //method utk menyimpan hasil update
    public function update($id, Request $request)
    {
        //cari data student berdasarkan id
        $course = Course::find($id); // select * FROM courses WHERE id = $id;

        //validasi data yg diterima
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'desc' => 'required',
        ]);

        //simpan perubahan
        $course->update([
            'name' => $request->name,
            'category' => $request->category,
            'desc' => $request->desc,
        ]);

        //kembalikan ke halaman student
        return redirect('/admin/courses')->with('message', 'Data student berhasil diedit!');
    }

    //method utk menghapus student
    public function destroy($id)
    {
        //cari data student berdasarkan id
        $course = Course::find($id); // select * FROM courses WHERE id = $id;

        //hapus student
        $course->delete();

        //kembalikan ke halaman student
        return redirect('/admin/courses')->with('message', 'Data student berhasil dihapus!');
    }
}
