@extends('layouts.main')

@section('title', 'SVJX Ukay-Ukay | Home')

@section('content-header')
<h1><i class="fa fa-home"></i> Home</h1>
@endsection

@section('content')

@if(count($items)>0)
<div class="row">
  @foreach($items as $item)
  <div class="col-md-6">
    <div class="box box-primary box-solid">
      <div class="box-header with-border">
        <h3 class="box-title">Item #{{ $item->id }}</h3>
        <!-- /.box-tools -->
      </div>
      <!-- /.box-header -->
      <div class="box-body" style="display: block;">
        <div class="row">
          <div class="col-md-5">
            <p><img src="{{ asset('storage/'.$item->thumbnail_path) }}" class="img-responsive img-thumbnail" width="100%"></p>
            <div>
              <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>
              <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button>
            </div>
          </div>
          <div class="col-md-7">
            <p class="text-right"><span class="lead">Php. {{ number_format($item->amount, 2) }} ({{ $item->unit }})</span><br>
              <a href="{{ action('BoothController@sellerItems', $item->user->id) }}"><small><i class="fa fa-user"></i> {{ $item->user->name }}</small></a></p>
            <div style="border: 1px dotted silver; overflow: auto; height: 150px; padding: 6px;">
              {!! html_entity_decode($item->description) !!}
            </div>
          </div>
        </div>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  @endforeach
</div>
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
