@extends('admin.main')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Course</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"></li>
          <li class="breadcrumb-item active">Course</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
                @if (Auth::user()->role == 'admin')
                <a href="/admin/courses/create" class="btn btn-primary my-3">+ Course</a>
                @endif
                <table class="table">
                    <tr> 
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Deskripsi</th>
                       @if (Auth::user()->role == 'admin')
                        <th>Action</th>
                        @endif
                    </tr>
                    @foreach($courses as $course) 
                    <tr>
                        <td>{{ $loop->iteration }} </td>
                        <td>{{ $course->name }} </td>
                        <td>{{ $course->category }} </td>
                        <td>{{ $course->desc }} </td>
                       @if (Auth::user()->role == 'admin')

                        <td class="d-flex">
                            <a href="/admin/courses/edit/{{ $course->id }}" class="btn btn-warning me-2">Edit</a>
                            <form action="/admin/courses/delete/{{ $course->id }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger" type="submit" onclick="return confirm('Yakin Hapus?')">Hapus</button>
                            </form>
                        </td>
                        @endif
                        
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </section>
@endsection