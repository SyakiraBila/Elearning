@extends('admin.main')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Students</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"></li>
          <li class="breadcrumb-item active">Student</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
                <a href="/admin/Student/create" class="btn btn-primary my-3">+ Students</a>
                <table class="table mt-2">
                    <tr> 
                        <th>No</th>
                        <th>Name</th>
                        <th>Nim</th>
                        <th>Class</th>
                        <th>Major</th>
                        <th>Course</th>
                        <th>Action</th>

                    </tr>
                    @foreach($students as $student) 
                    <tr>
                        <td>{{ $loop->iteration }} </td>
                        <td>{{ $student->name }} </td>
                        <td>{{ $student->nim }} </td>
                        <td>{{ $student->class }} </td>
                        <td>{{ $student->major }} </td>
                        <td>{{ $student->course->name}} </td>

                        <td class="d-flex">
                            <a href="/admin/Student/edit/{{ $student->id }}" class="btn btn-warning me-2">Edit</a>
                            <form action="/admin/Student/delete/{{ $student->id }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger" type="submit" onclick="return confirm('Yakin Hapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </section>
@endsection