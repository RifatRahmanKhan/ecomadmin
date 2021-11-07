@extends('layouts.app')

@section('title', 'Add new district')

@section('content')
<section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">

          <div class="col-lg-12">
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Add New District</h3>

                  
                  
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
                  <form action="{{ route('district.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label>District Name</label>
                      <input type="text" name="name"  value='{{ old('name') }}' class="form-control" required="required">
                    </div>

                    <div class="form-group">
                      <label>Choose Division</label>
                      <select class="form-control" name="division_id">
                          @foreach($divisions as $division)
                          <option value="{{ $division->id }}">{{ $division->name }}</option>
                          @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <input type="submit" name="submit" class="btn btn-primary" value="Add District">
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