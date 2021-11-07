@extends('layouts.app')

@section('title', 'Social Media Links')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="h3 text-primary">Social Media Links</div>
            <div class="card">
                <div class="card-header">Facebook Link:</div>
                <div class="card-body">{{$socialMedia->facebook_link}}</div>
                <div class="card-footer">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#fbLinkModal">Edit</button>
                </div>
            </div>
            <!-- Modal -->
<div class="modal fade" id="fbLinkModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Facebook Link</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{route("updateFbLink")}}">
            @csrf
            <input type="text" class="form-control" name="fbLink" id="fbLink" value="{{$socialMedia->facebook_link}}"/>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
        </div>
    </div>
</div>
@endsection