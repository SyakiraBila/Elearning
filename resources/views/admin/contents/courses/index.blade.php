@extends('admin.main')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Courses</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"></li>
          <li class="breadcrumb-item active">Courses</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <tr> 
                        <th>No</th>
                        <th>Name</th>
                        <th>Kategori</th>
                        <th>Desc</th>
                        
                    </tr>
                    @foreach($courses as $course) 
                    <tr>
                        <td>{{ $course->id }} </td>
                        <td>{{ $course->name }} </td>
                        <td>{{ $course->category }} </td>
                        <td>{{ $course->desc }} </td>
                        
                        <td>
                            <a href="#" class="btn btn-warning">Edit</a>
                            <a href="#" class="btn btn-danger">Hapus</a>
                        </td>
                    @endforeach

                </table>
    </section>
@endsection