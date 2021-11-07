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
              <li class="breadcrumb-item active">Update Brand Information</li>
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
                  <h3 class="card-title">Update Brand</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                  <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="display: block;">                 
                  <form action="{{ route('brand.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label>Brand Name</label>
                      <input type="text" name="name" class="form-control" required="required" value="{{ $brand->name }}">
                    </div>

                    <div class="form-group">
                      <label>Brand Description</label>
                      <textarea class="form-control" name="description" rows="5">{{ $brand->description }}</textarea>
                    </div>

                    <div class="form-group">
                      @if ( $brand->image == NULL )
                        No Thumbnail Uploaded
                      @else
                        <img src="{{ asset('backend/img/brands/' . $brand->image ) }}" width="30">
                      @endif
                      <input type="file" name="image" class="form-control-file">
                    </div>

                    <div class="form-group">
                      <input type="submit" name="updateBrand" class="btn btn-primary" value="Save Changes">
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