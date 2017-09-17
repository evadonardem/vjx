@extends('layouts.main')

@section('title', 'Items')

@section('content-header')
<h1>
  My Items
  <small>List of all available / unsold items</small>
</h1>
<ol class="breadcrumb">
  <li><a href="{{ action('DashboardController@index') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
  <li><a href="{{ action('ItemController@index') }}">My Items</a></li>
  <li class="active">New Item</li>
</ol>
@endsection

@section('content')
<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">New Item</h3>
    <div class="box-tools pull-right">
      <a href="{{ URL::previous() }}" class="btn btn-box-tool"><i class="fa fa-arrow-circle-left"></i> Back</a>
    </div>
    <!-- /.box-tools -->
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <form class="" action="{{ action('ItemController@store') }}" method="post" enctype="multipart/form-data">

      <div class="form-group">
        <label for="">Photo:</label>
        <input type="file" name="photo[]" class="form-control" multiple>
      </div>

      <div class="form-group">
        <label for="">Short Description:</label>
        <input type="text" name="short_description" value="" class="form-control" maxlength="100">
      </div>

      <div class="form-group">
        <label for="">Description:</label>
        <textarea name="description" rows="8" cols="80" class="form-control" maxlength="1000"></textarea>
      </div>

      <div class="form-group">
        <label for="">Amount:</label>
        <div class="row">
          <div class="col-md-8">
            <input type="text" name="amount" value="" class="form-control">
          </div>
          <div class="col-md-4">
            <select name="unit_id" class="form-control">
              @foreach($units as $unit)
              <option value="{{ $unit->id }}">{{ $unit->id }} ({{ $unit->description }})</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>

      <div class="form-group">
        {{ csrf_field() }}
        <button class="btn btn-primary pull-right">Add</button>
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
  });
</script>
@endsection
