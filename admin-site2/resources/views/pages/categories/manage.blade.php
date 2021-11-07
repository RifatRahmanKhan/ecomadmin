@extends ( 'layouts.app' )

@section('title', 'Categories')

@section ( 'content' )
	<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
        	<div class="col-lg-12">
        		<div class="card card-primary">
	              <div class="card-header row">
	                <h3 class="card-title col-md-6">All Categories</h3>

	                <div class="col-md-6">
	                  <a href='{{route('district.create')}}' class="float-sm-right btn btn-success">Add new</a>
	                </div>
	                <!-- /.add new -->
	              </div>
	              <!-- /.card-header -->
	              <div class="card-body" style="display: block;">
	                <table class="table table-bordered table-hover table-striped">
					  <thead class="text-danger">
					    <tr>
					      <th scope="col">#Sl.</th>
					      <th scope="col">Image</th>
					      <th scope="col">Category Name</th>
					      <th scope="col">Description</th>
					      <th scope="col">Parent Category</th>					      
					      <th scope="col">Action</th>
					    </tr>
					  </thead>
					  <tbody>
					  	@php
					  		$i = 1;
					  	@endphp
					  	@foreach ( $categories as $category )
					    <tr>
					      <th scope="row">{{ $i }}</th>
					      <td>
					      	@if ( $category->image == NULL )
					      		No Thumbnail Uploaded
					      	@else
					      		<img src="{{ asset('backend/img/categories/' . $category->image ) }}" width="30">
					      	@endif
					      </td>
					      <td>{{ $category->name }}</td>
					      <td>{{ $category->description }}</td>
					      <td>
					      	@if ( $category->parent_id == 0 )
					      		<span class="badge badge-success">Primary Category</span>
					      	@else
					      		<span class="badge badge-info">{{ $category->parent->name }}</span>
					      	@endif
					      </td>					      
					      <td>
					      	<div class="btn-group">
					      		<a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary btn-sm">Update</a>
					      		<a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteCat{{$category->id}}">Delete</a>
					      	</div>
					      </td>
<!-- Delete Modal Start -->
<div class="modal fade" id="deleteCat{{$category->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Do you confirm to delete this Brand?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <form action="{{ route('category.destroy', $category->id) }}" method="POST">
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
@endsection