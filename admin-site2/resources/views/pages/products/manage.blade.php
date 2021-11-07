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
              <li class="breadcrumb-item active">Manage All Product</li>
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
	                <h3 class="card-title">All Product List</h3>

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
					      <th scope="col">Image</th>
					      <th scope="col">Title</th>
					      <th scope="col">Brand</th>
					      <th scope="col">Category</th>
					      <th scope="col">price</th>
					      <th scope="col">Offer Price</th>
					      <th scope="col">Stock</th>
					      <th scope="col">Is Featured</th>
					      <th scope="col">Status</th>
					      <th scope="col">Action</th>
					    </tr>
					  </thead>
					  <tbody>
					  	@php
					  		$i = 1;
					  	@endphp
					  	@foreach ( $products as $product )
					    <tr>
					      <th scope="row">{{ $i }}</th>
					      <td>
					      	@if ( 0 == 0 )
					      		No Thumbnail Uploaded
					      	@else
					      		<img src="{{ asset('backend/img/products/' . $product->image ) }}" width="30">
					      	@endif
					      </td>
					      <td>{{ $product->title }}</td>
					      <td>{{ $product->brand->name }}</td>
					      <td>{{ $product->category->name }}</td>
					      <td>{{ $product->price }}</td>
					      <td>
					      	@if ( !is_null($product->offer_price) )
			      				{{ $product->offer_price }}
					      	@else 
					      		N/A
					      	@endif
					      </td>
					      <td>{{ $product->quantity }} Pcs</td>
					      <td>
					      	@if ( $product->featured == 1 )
					      		<span class="badge badge-success">Yes</span>
					      	@else if ( $product->featured == 0 )
					      		<span class="badge badge-info">No</span>
					      	@endif
					      </td>
					      <td>
					      	@if ( $product->status == 1 )
					      		<span class="badge badge-success">Active</span>
					      	@else if ( $product->status == 0 )
					      		<span class="badge badge-danger">Inactive</span>
					      	@endif
					      </td>
					      
					      
					      <td>
					      	<div class="btn-group">
					      		<a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary btn-sm">Update</a>
					      		<a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteProduct{{$product->id}}">Delete</a>
					      	</div>
					      </td>
<!-- Delete Modal Start -->
<div class="modal fade" id="deleteProduct{{$product->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Do you confirm to delete this Product?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <form action="{{ route('product.destroy', $product->id) }}" method="POST">
        	@csrf
        	<input type="submit" class="btn btn-danger" name="deleteProduct" value="Yes">
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