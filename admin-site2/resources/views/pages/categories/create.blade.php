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
                  <h3 class="card-title">Add New Category</h3>

                  
                  <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="display: block;">                 
                  <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label>Category Name</label>
                      <input type="text" name="name" class="form-control" required="required">
                    </div>

                    <div class="form-group">
                      <label>Category Description</label>
                      <textarea class="form-control" name="description" rows="5"></textarea>
                    </div>

                    <div class="form-group">
                      <label>Primary Category (Optional)</label>
                      <select class="form-control" name="parent_id">
                        <option value="0">Please Select The Primary Category if any</option>
                        @foreach( $primary_categories as $parent )
                          <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-9">
                          <input id='imgInp' type="file" name="image" class="form-control-file">
                        </div>
                          
                        <div class="col-md-1">
                          <img id="catImg" style="widgh:100%;height:auto;" alt=""category image />
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <input type="submit" name="addCategory" class="btn btn-primary" value="Add New Category">
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
@section('script')
<script>
$(document).ready(function(){
    function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#catImg').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#imgInp").change(function(){
    readURL(this);
});
});
</script>
@endsection