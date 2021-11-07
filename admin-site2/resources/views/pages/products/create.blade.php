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
              <li class="breadcrumb-item active">Add New Product</li>
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
                  <h3 class="card-title">Add New Product</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                  <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="display: block;">                 
                  <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                      <!-- Left Side -->
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label>Title</label>
                          <input type="text" name="title" class="form-control" required="required">
                        </div>

                        <div class="form-group">
                          <label>Brand</label>                          
                          <select class="form-control" name="brand_id">
                            <option value="0">Please Select The Product Brand</option>
                            @foreach( App\Models\Backend\Brand::orderBy('name', 'asc')->get() as $brand )
                              <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                          </select>
                        </div>

                        <div class="form-group">
                          <label>Category</label>
                          <select class="form-control" name="category_id">
                            <option value="0">Please Select The Product Category / Sub Category</option>
                            @foreach( App\Models\Backend\Category::orderBy('name', 'asc')->where('parent_id', 0)->get() as $pcat )
                              <option value="{{ $pcat->id }}">{{ $pcat->name }}</option>
                              @foreach ( App\Models\Backend\Category::orderBy('name', 'asc')->where('parent_id', $pcat->id )->get() as $childCat )
                                <option value="{{ $childCat->id }}"> -- {{ $childCat->name }}</option>
                              @endforeach
                            @endforeach
                          </select>
                        </div>

                        <div class="form-group">
                          <label>Price</label>
                          <input type="text" name="price" class="form-control">
                        </div>

                        <div class="form-group">
                          <label>Offer Price</label>
                          <input type="text" name="offer_price" class="form-control">
                        </div>

                        <div class="form-group">
                          <label>Stock Quantity</label>
                          <input type="text" name="quantity" class="form-control" value="5">
                        </div>

                        <div class="form-group">
                          <label>Is Featured</label>
                          <select class="form-control" name="featured">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                          </select>
                        </div>

                        <div class="form-group">
                          <label>Active Status</label>
                          <select class="form-control" name="status">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                          </select>
                        </div>
                      </div>

                      <!-- Right Side -->
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label>Description</label>
                          <textarea class="form-control" rows="10" name="description"></textarea>
                        </div>

                          <div class="form-group">
                            <label>Upload Thumbnail Image</label>
                            <input type="file" name="product_images[]" class="form-control-file">
                          </div>

                          <div class="form-group">
                            <label>Upload Gallery Image</label>
                            <input type="file" name="product_images[]" class="form-control-file"><br>
                            <input type="file" name="product_images[]" class="form-control-file"><br>
                            <input type="file" name="product_images[]" class="form-control-file"><br>
                            <input type="file" name="product_images[]" class="form-control-file">
                          </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-lg-12">
                        <div class="form-group">
                            <input type="submit" name="addProduct" class="btn btn-primary btn-block" value="Publish Product">
                          </div>
                      </div>
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
    <!-- /.content -->
  </div>
  
@endsection