@extends('admin.main')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>+ Course</h1>
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
                <form action="/admin/courses/store" method="post" class="mt-3">
                    @csrf
                    <div class="mb-2">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>

                    <div class="mb-2">
                        <label for="category" class="form-label">Kategori</label>
                        <input type="text" name="category" id="category" class="form-control">
                    </div>


                    <div class="mb-2">
                        <label for="desc" class="form-label">Deskripsi</label>
                        <input type="text" name="desc" id="desc" class="form-control">
                    </div>

                    <div class="mb-4">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection