@extends ( 'layouts.app' )

@section ( 'content' )
  
  <div>
    

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">

          <div class="col-lg-12">
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Update Category</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                  <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="display: block;">                 
                  <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label>Category Name</label>
                      <input type="text" name="name" class="form-control" required="required" value="{{ $category->name }}">
                    </div>

                    <div class="form-group">
                      <label>Category Description</label>
                      <textarea class="form-control" name="description" rows="5">{{ $category->description }}</textarea>
                    </div>

                    <div class="form-group">
                      <label>Primary Category (Optional)</label>
                      <select class="form-control" name="parent_id">
                        <!-- <option value="0">Please Select The Primary Category if any</option> -->
                        @foreach( $primary_categories as $parent )
                          <option value="{{ $parent->id }}" @if ( $parent->id == $category->id ) selected @endif>{{ $parent->name }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      @if ( $category->image == NULL )
                        No Thumbnail Uploaded
                      @else
                        <img src="{{ asset('backend/img/categories/' . $category->image ) }}" width="30">
                      @endif
                      <input type="file" name="image" class="form-control-file">
                    </div>

                    <div class="form-group">
                      <input type="submit" name="updateCategory" class="btn btn-primary" value="Save Changes">
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