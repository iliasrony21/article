@extends('user.dashboard')
@section('user')


<h1>Manage page</h1>
@if(Session::has('success'))
<div class="alert alert-success" role="alert">
{{ Session::get('success') }}
</div>
@endif

<div class="d-flex align-items-center justify-content-between my-5">


        </div>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">Sl</th>
      <th scope="col">Title</th>
      <th scope="col">content</th>
      <th scope="col">Author</th>
      <th scope="col">Published Date</th>
      <th scope="col">Image</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @if(count($articles) > 0)
    @foreach($articles as $key=>$article)
    <tr>
      <td>{{$key+1}}</td>
      <td>{{ $article->title}}</td>
      <td>{{ $article->content}}</td>
      <td>{{ $article->Author}}</td>
      <td>{{ $article->published_date}}</td>

      <td> <img src="{{asset($article->image)}}" style="width: 120px; height: 120px;" >  </td>

      <td>
        <div>
            <a href="{{ route('article.edit',$article->id) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('article.delete',$article->id) }}"class="btn btn-danger">Delete</a>
</div>
      </td>

    </tr>
 @endforeach
 @else
 <div>
    <h1>No Article is here</h1>
 </div>
 @endif
  </tbody>
</table>



@endsection
