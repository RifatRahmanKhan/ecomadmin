@extends ( 'backend.layout.template' )

@section ( 'body-content' )
	
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item active">Manage All Brand</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
        	<div class="col-lg-12">
        		<div class="card card-primary">
	              <div class="card-header">
	                <h3 class="card-title">All Brand List</h3>

	                <div class="card-tools">
	                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
	                    <i class="fas fa-minus"></i>
	                  </button>
	                </div>
	                <!-- /.card-tools -->
	              </div>
	              <!-- /.card-header -->
	              <div class="card-body" style="display: block;">
	                <table class="table table-bordered table-hover table-striped">
					  <thead class="thead-dark">
					    <tr>
					      <th scope="col">#Sl.</th>
					      <th scope="col">Brand Name</th>
					      <th scope="col">Description</th>
					      <th scope="col">Image</th>
					      <th scope="col">Action</th>
					    </tr>
					  </thead>
					  <tbody>
					  	@php
					  		$i = 1;
					  	@endphp
					  	@foreach ( $brands as $brand )
					    <tr>
					      <th scope="row">{{ $i }}</th>
					      <td>{{ $brand->name }}</td>
					      <td>{{ $brand->description }}</td>
					      <td>
					      	@if ( $brand->image == NULL )
					      		No Thumbnail Uploaded
					      	@else
					      		<img src="{{ asset('backend/img/brands/' . $brand->image ) }}" width="30">
					      	@endif
					      </td>
					      <td>
					      	<div class="btn-group">
					      		<a href="{{ route('brand.edit', $brand->id) }}" class="btn btn-primary btn-sm">Update</a>
					      		<a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteBrand{{$brand->id}}">Delete</a>
					      	</div>
					      </td>
<!-- Delete Modal Start -->
<div class="modal fade" id="deleteBrand{{$brand->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Do you confirm to delete this Brand?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <form action="{{ route('brand.destroy', $brand->id) }}" method="POST">
        	@csrf
        	<input type="submit" class="btn btn-danger" name="deleteBrand" value="Yes">
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
    <!-- /.content -->
  </div>
	
@endsection