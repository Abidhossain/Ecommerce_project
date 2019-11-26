 @extends('admin.admin_master')
@section('title','Ecommerce | Role List')
@section('content')
<div class="row">
  <div class="col-md-12">
     <div class="tile">
        <div class="tile-body">
          <h4>Create New Role
          <a class="btn btn-primary pull-right" href="{{ route('roles.index') }}"> Back</a>
          </h4>
          @if (count($errors) > 0)
              <div class="alert alert-danger">
                  <strong>Whoops!</strong> There were some problems with your input.<br><br>
                  <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
                  </ul>
              </div>
          @endif
          <form method="post" action="{{ route('roles.store') }}">
            @csrf
          <div class="row">
              <div class="col-md-4">
                  <div class="form-group">
                      <label>Role Name:</label>
                      <input type="text" name="name" class="form-control">
                  </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <label for="permission"> Permission:</label>
                      <br/>
                      @foreach($permission as $value)
                        <label>
                            <input type="checkbox" name="permission[]" id="permission" value="{{ $value->id }}"> {{ $value->name }}
                        </label>
                          <br>
                      @endforeach
                  </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
              </div>
          </div>
          </form>
        </div>
     </div>
  </div>
</div>
@endsection
