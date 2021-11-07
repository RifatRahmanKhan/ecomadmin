@extends('layouts.app')

@section('title', 'Divisions')

@section('content')
<section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
        	<div class="col-lg-12">
        		<div class="card card-primary">
	              <div class="card-header row">
	                <h3 class="col-md-6 card-title text-primary">All Divisions</h3>

	                <div class="col-md-6">
	                  <a href='{{route('division.create')}}' class="float-sm-right btn btn-success">Add new</a>
	                </div>
	                <!-- /.card-tools -->
	              </div>
	              <!-- /.card-header -->
	              <div class="card-body" style="display: block;">
	                <table class="table table-bordered table-hover table-striped table-responsive d-block d-md-table">
					  <thead class="text-danger">
					    <tr>
					      <th scope="col">#Sl.</th>
					      <th scope="col">Division Name</th>
					      <th scope="col">Priority Number</th>
					      <th scope="col">Action</th>
					    </tr>
					  </thead>
					  <tbody>
					  	@php
					  		$i = 1;
					  	@endphp
					  	@foreach ( $divisions as $division )
					    <tr>
					      <th scope="row">{{ $i }}</th>
					      <td>{{ $division->name }}</td>
					      <td>{{ $division->priority }}</td>
					      <td>
					      	<div class="btn-group">
					      		<a href="{{ route('division.edit', $division->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
					      		<a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteDivision{{$division->id}}"><i class="fa fa-trash"></i></a>
					      	</div>
					      </td>
<!-- Delete Modal Start -->
<div class="modal fade" id="deleteDivision{{$division->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Do you confirm to delete this Division named {{	$division->name	}}?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <form action="{{ route('division.destroy', $division->id) }}" method="POST">
        	@csrf
        	<input type="submit" class="btn btn-danger" name="deleteConfirmer" value="Yes">
        	<button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Delete Modal End -->
					    </tr>
					    @php
					  		$i++;
					  	@endphp
					    @endforeach
					    
					  </tbody>
					</table>

	              </div>
	              <!-- /.card-body -->
	            </div>
        	</div>
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
@endsection