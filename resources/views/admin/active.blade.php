@extends('admin.dashboard')
@section('admin')


<h1>Active user</h1>
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
      <th scope="col">name</th>
      <th scope="col">email</th>

      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

    @foreach($users as $key=>$user)
    <tr>
      <td>{{$key+1}}</td>
      <td>{{ $user->name}}</td>
      <td>{{ $user->email}}</td>
    <td>
    <a href="{{ route('active.approved',$user->id) }}" class="btn btn-warning">Inactive</a>
                
    </td>
        <div>

</div>
      </td>

    </tr>
 @endforeach

  </tbody>
</table>



@endsection
