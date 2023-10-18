@extends('user.dashboard')
@section('user')
<div class="container">
<h1 class="text-center my-2">Article Add Page</h1>
<form action="{{ route('article.update',$article->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ $article->id }}">
		                    <input type="hidden" name="old_image" value="{{ $article->image }}">

<div class="row">
    <div class="col">
    <label for="exampleInputEmail1" class="form-label">Article Title</label>
    <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $article->title }}">
    </div>
    <div class="col">
    <label for="exampleInputEmail1" class="form-label">Article content</label>
    <input type="text" name="content" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $article->content }}">
        </div>
</div>

<div class="row">
    <div class="col">
    <label for="exampleInputEmail1" class="form-label">Article Author</label>
    <input type="text" name="author" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $article->Author }}">
    </div>
    <div class="col">
    <label for="exampleInputEmail1" class="form-label">Article Published date</label>
    <input type="date" name="publish_date" class="form-control" id="exampleInputEmail1"  value="{{ $article->published_date }} >
</div>

 <div class="col-md-6">
    <input type="file" name="image" id="image">
 <img id="" name='old_image' src="{{ asset($article->image)}}" alt="Admin" style="width:100px; height: 100px;"  >
 </div>



  <button type="submit" class="btn btn-primary d-grid">Submit</button>

</form>
</div>

<script type="text/javascript">
        $(document).ready(function(){
            $('#image').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showImage').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>

@endsection
