@extends('layouts.main')

@section('title', 'SVJX Ukay-Ukay | Home')

@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="input-group">
      <input type="text" class="form-control input-lg" placeholder="Keyword">
      <span class="input-group-btn">
        <button type="button" class="btn btn-info btn-flat btn-lg"><i class="fa fa-lg fa-search"></i></button>
      </span>
    </div>
  </div>
</div>
<br>

@if(count($items)>0)
<div class="row">
  @foreach($items as $item)
  <div class="col-md-4 col-sm-4">
    <div class="box box-primary box-solid">
      <div class="box-header with-border">
        <h3 class="box-title">Item No. {{ $item->id }}</h3>
        <!-- /.box-tools -->
      </div>
      <!-- /.box-header -->
      <div class="box-body" style="display: block;">
        <div class="row">
          <div class="col-md-12">
            <p><img src="{{ asset($item->photos[ count($item->photos) > 0 ? rand(0, count($item->photos)-1) : 0 ]->thumbnail ) }}" class="img-responsive img-thumbnail" width="100%"></p>
            <?php $pos = strpos($item->short_description, ' ', strlen($item->short_description) > 30 ? 30 : strlen($item->short_description)) ?>
            <p>{{ substr($item->short_description, 0, (!$pos) ? strlen($item->short_description) : $pos) }}{{ (!$pos) ? null : '...' }}</p>
            <a href="{{ action('BoothController@items', $item->id) }}" class="btn btn-block btn-primary">View Details</a>
            <p class="text-right"><span class="lead">Php. {{ number_format($item->amount, 2) }} / {{ $item->unit->id }}</span><br>
              <a href="{{ action('BoothController@sellerItems', $item->user->id) }}"><small><i class="fa fa-user"></i> {{ $item->user->name }}</small></a></p>
          </div>
        </div>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  @endforeach
</div>
@else
<p>No items yet posted online.</p>
@endif

@endsection


@section('scripts')
<script type="text/javascript">
$(function() {
  $('.item-delete').click(function(e) {
    e.preventDefault();
    $.post($(this).prop('href'), { '_method' : 'DELETE', '_token' : $('[name="_token"]').val()}, function() {
      location.href = location.href;
    });
  });
});
</script>
@endsection
