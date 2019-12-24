@extends('layout')

@section('content')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Add student</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('students.store') }}"   enctype="multipart/form-data" >
          @csrf
          <div class="form-group">    
              <label for="first_name">First Name:</label>
              <input type="text" class="form-control" name="first_name"/>
          </div>

          <div class="form-group">
              <label for="last_name">Last Name:</label>
              <input type="text" class="form-control" name="last_name"/>
          </div>
		   <div class="form-group">
              <label for="parent_name">Parent Name:</label>
              <input type="text" class="form-control" name="parent_name"/>
          </div>

          <div class="form-group">
              <label for="email">Email:</label>
              <input type="text" class="form-control" name="email_id"/>
          </div>
          <div class="form-group">
              <label for="mobile_number">Mobile:</label>
              <input type="text" class="form-control" name="mobile_number"/>
          </div>
          <div class="form-group">
              <label for="standard">Standard:</label>
              <input type="text" class="form-control" name="standard"/>
          </div>
		  
          <div class="form-group">
              <label for="course">Course:</label>
              <input type="text" class="form-control" name="course"/>
          </div>               

			<div class="form-group">
              <label for="document1">Document:</label>
              <input type="file" class="form-control" name="document1"/>
          </div>
		  
		  <div class="form-group">
              <label for="document2">Document:</label>
              <input type="file" class="form-control" name="document2[]" multiple />
			  
          </div>
          
          <button type="submit" class="btn btn-primary-outline">Add student</button>
      </form>
  </div>
</div>
</div>
@endsection