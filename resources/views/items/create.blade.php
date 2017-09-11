@extends('layouts.main')

@section('title', 'Items')

@section('content')

<a href="{{ action('ItemController@index') }}" class="btn btn-default">Back</a>



<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">New Item</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <form class="" action="{{ action('ItemController@store') }}" method="post" enctype="multipart/form-data">
      <label for="">Photo:</label>
      <input type="file" name="photo">
      <label for="">Description:</label><br>
      <textarea name="description" rows="8" cols="80"></textarea><br>
      <label for="">Amount:</label><br>
      <input type="text" name="amount" value="">
      <select name="unit">
        <option>Each</option>
        <option>Set</option>
      </select>
      {{ csrf_field() }}
      <button>Add</button>
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
