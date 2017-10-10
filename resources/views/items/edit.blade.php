@extends('layouts.main')

@section('title', 'Items')

@section('content')
<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">Item No. {{ $item->id }}</h3>
    <div class="box-tools pull-right">
      <a href="{{ URL::previous() }}" class="btn btn-box-tool"><i class="fa fa-arrow-circle-left"></i> Back</a>
    </div>
    <!-- /.box-tools -->
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <form class="" action="{{ action('ItemController@update', $item->id) }}" method="post" enctype="multipart/form-data">

      <div class="form-group">
        <label>Photos:</label>
        <div class="row">
          @foreach($item->photos as $p)
          <div class="photo-wrapper col-md-3 col-sm-4">
            <div class="well well-sm">
              <img src="{{ asset($p->thumbnail) }}" class="img-responsive img-thumbnail" width="100%">
              <button id="photo{{ $p->id }}" type="button" class="photo-delete btn btn-block btn-flat"><i class="fa fa-trash"></i> Delete Photo</button>
            </div>
          </div>
          @endforeach
          <div class="delete-photo-wrapper"></div>
        </div>
      </div>

      <div class="form-group">
        <label>Photo:</label>
        <input type="file" name="photo[]" class="form-control" multiple>
      </div>

      <div class="form-group">
        <label>Short Description:</label>
        <input type="text" name="short_description" value="{{ old('short_description', $item->short_description) }}" class="form-control" maxlength="100">
      </div>

      <div class="form-group">
        <label>Description:</label>
        <textarea name="description" rows="8" cols="80" class="form-control" maxlength="1000">{!! old('description', $item->description) !!}</textarea><br>
      </div>

      <div class="form-group">
        <label>Amount:</label>
        <div class="row">
          <div class="col-md-8">
            <input type="text" name="amount" value="{{ old('amount', $item->amount) }}" class="form-control">
          </div>
          <div class="col-md-4">
            <select name="unit_id" class="form-control">
              @foreach($units as $unit)
              <option value="{{ $unit->id }}" {{ ($unit->id==$item->unit->id) ? 'selected' : null }} >{{ $unit->id }} ({{ $unit->description }})</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>

      <div class="form-group">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PATCH">
        <button class="btn btn-primary pull-right">Update</button>
      </div>

    </form>
  </div>
  <!-- /.box-body -->
  <div class="box-footer">

  </div>
  <!-- /.box-footer -->
</div>
<!-- /.box -->

@endsection

@section('scripts')
<!-- Bootstrap WYSIHTML5 -->
<link rel="stylesheet" href="{{ asset('adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
<script type="text/javascript" src="{{ asset('adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<script type="text/javascript">
  $(function() {
    $('textarea').wysihtml5();

    $('body').on('click', '.photo-delete', function(e) {
      var photoID = $(this).prop('id').replace('photo', '');
      $('.delete-photo-wrapper').append($('<input type="hidden" name="delete_photo[]" value="'+photoID+'" />'));
      $(this).closest('.photo-wrapper').remove();
    });
  });
</script>
@endsection
