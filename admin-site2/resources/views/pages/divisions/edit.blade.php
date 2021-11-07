@extends('layouts.app')

@section('title', 'Edit division details')

@section('content')
<section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">

          <div class="col-lg-12">
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Edit Division details</h3>

                  
                  
                </div>
                <!-- /.card-header -->
                @if($errors->any())
                  <div class="alert alert-danger">
                    <ul>
                      @foreach($errors->all() as $error)
                      <li>{{  $error  }}</li>
                      @endforeach
                    </ul>
                  </div>
                @endif
                <div class="card-body" style="display: block;">                 
                  <form action="{{ route('division.update', $division->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label>Division Name</label>
                      <input type="text" name="name"  value='{{ $division->name }}' class="form-control" required="required">
                    </div>

                    <div class="form-group">
                      <label>Priority Number</label>
                      <input type="number" min='0' value='{{ $division->priority }}' name="priority" class="form-control">
                    </div>

                    <div class="form-group">
                      <input type="submit" name="submit" class="btn btn-primary" value="Add Division">
                    </div>
                  </form>
                </div>
                <!-- /.card-body -->
              </div>
          </div>

        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
@endsection