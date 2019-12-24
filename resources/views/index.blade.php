@extends('layout')

@section('content')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Students</h1>    
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Name</td>
          <td>Email</td>
          <td>Parent Name</td>
          <td>Mobile</td>
          <td>Standard</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $student)
        <tr>
            <td>{{$student->id}}</td>
            <td>{{$student->first_name}} {{$student->last_name}}</td>
            <td>{{$student->email_id}}</td>
            <td>{{$student->parent_name}}</td>
            <td>{{$student->mobile_number}}</td>
            <td>{{$student->standard}}</td>
            <td>
                <a href="{{ route('students.edit',$student->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('students.destroy', $student->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection