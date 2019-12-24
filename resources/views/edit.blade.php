@extends('layout')

@section('content')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Update student</h1>
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
      <form method="post" action="{{ route('students.update', $student->id) }}"   enctype="multipart/form-data" >
	   @method('PATCH') 
          @csrf
          <div class="form-group">    
              <label for="first_name">First Name:</label>
              <input type="text" class="form-control" name="first_name"  value={{ $student->first_name }} />
          </div>

          <div class="form-group">
              <label for="last_name">Last Name:</label>
              <input type="text" class="form-control" name="last_name"  value={{ $student->last_name }} />
          </div>
		   <div class="form-group">
              <label for="parent_name">Parent Name:</label>
              <input type="text" class="form-control" name="parent_name"  value={{ $student->parent_name }} />
          </div>

          <div class="form-group">
              <label for="email">Email:</label>
              <input type="text" class="form-control" name="email_id"  value={{ $student->email_id }} />
          </div>
          <div class="form-group">
              <label for="mobile_number">Mobile:</label>
              <input type="text" class="form-control" name="mobile_number"  value={{ $student->mobile_number }} />
          </div>
          <div class="form-group">
              <label for="standard">Standard:</label>
              <input type="text" class="form-control" name="standard"  value={{ $student->standard }} />
          </div>
		  
          <div class="form-group">
              <label for="course">Course:</label>
              <input type="text" class="form-control" name="course"  value={{ $student->course }} />
          </div>               

			<div class="form-group">
              <label for="document1">Document:</label>
              <input type="file" class="form-control" name="document1"/>
			  <img src="{{ url('/'). $student->document1 }}"  width="100" />
			  
          </div>
		  
		  <div class="form-group">
              <label for="document2">Document:</label>
              <input type="file" class="form-control" name="document2[]" multiple />
			  @foreach($images as $image )
			   <img src="{{ url('/').$image->document2 }}"  width="100" />
			   @endforeach
			   
          </div>
          
          <button type="submit" class="btn btn-primary-outline">Update student</button>
      </form>
  </div>
</div>
</div>
@endsection