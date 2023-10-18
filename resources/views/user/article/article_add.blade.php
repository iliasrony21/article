@extends('user.dashboard')
@section('user')

<div class="container">
<h1 class="text-center my-2">Article Add Page</h1>
<form action="{{ route('article.store') }}" method="post" enctype="multipart/form-data">
    @csrf
  <div class="row mb-3">
    <div class="col">
    <label for="exampleInputEmail1" class="form-label">Article Title</label>
    <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="col">
    <label for="exampleInputEmail1" class="form-label">Article content</label>
    <input type="text" name="content" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
  </div>
  <div class="row mb-3">
    <div class="col-md-6">
    <label for="exampleInputEmail1" class="form-label">Article Author</label>
    <input type="text" name="author" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="col-md-6 mb-3">
    <label for="exampleInputEmail1" class="form-label">Article Published Date</label><br>
    <input type="date" name="publish_date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

   </div>
  </div>

   <div class="col-md-6 mb-3">
    <label for="exampleInputEmail1" class="form-label">Image</label><br>
    <input type="file" name="image" class="form-control datepicker_input" id="image" aria-describedby="emailHelp">

   </div>



  <button type="submit" class="btn btn-primary d-grid">Submit</button>

</form>
</div>

@if(Session::has('success'))
<div class="alert alert-success" role="alert">
{{ Session::get('success') }}
</div>
@endif
@endsection
