@extends('admin.main')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"></li>
          <li class="breadcrumb-item active">Dashboard</li>
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
                        <th>Nim</th>
                        <th>Class</th>
                        <th>Major</th>
                        <th>Action</th>
                    </tr>
                    @foreach($students as $student) 
                    <tr>
                        <td>1</td>
                        <td>{{ $student->name }} </td>
                        <td>{{ $student->nim }} </td>
                        <td>{{ $student->class }} </td>
                        <td>{{ $student->major }} </td>
                        <td>
                            <a href="#" class="btn btn-warning">Edit</a>
                            <a href="#" class="btn btn-danger">Hapus</a>
                        </td>
                    @endforeach

                </table>
    </section>
@endsection