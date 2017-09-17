@extends('layouts.main')

@section('title', 'SVJX Ukay-Ukay | Home')

@section('content-header')
<h1><i class="fa fa-list"></i> Seller Items</h1>
<ol class="breadcrumb">
  <li><a href="{{ action('BoothController@index') }}"><i class="fa fa-home"></i> Home</a></li>
  <li class="active">Seller Items</li>
</ol>
@endsection

@section('content')
<div class="row">
  <div class="col-md-6">
    <!-- Widget: user widget style 1 -->
    <div class="box box-widget widget-user">
      <!-- Add the bg color to the header using any of the bg-* classes -->
      <div class="widget-user-header bg-red-active">
        <h3 class="widget-user-username">{{ $seller->name }}</h3>
        <h5 class="widget-user-desc">Seller ID: {{ $seller->id }}</h5>
      </div>
      <div class="widget-user-image">
        <img class="img-circle" src="{{ asset('storage/images/photo_placeholder.jpg') }}" alt="User Avatar">
      </div>
      <div class="box-footer">
        <div class="row">
          <div class="col-sm-4 border-right">
            <div class="description-block">
              <h5 class="description-header">{{ $sold_items }}</h5>
              <span class="description-text">SOLD</span>
            </div>
            <!-- /.description-block -->
          </div>
          <!-- /.col -->
          <div class="col-sm-4 border-right">
            <div class="description-block">
              <h5 class="description-header">13,000</h5>
              <span class="description-text">FOLLOWERS</span>
            </div>
            <!-- /.description-block -->
          </div>
          <!-- /.col -->
          <div class="col-sm-4">
            <div class="description-block">
              <h5 class="description-header">{{ count($items) }}</h5>
              <span class="description-text">ITEMS</span>
            </div>
            <!-- /.description-block -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
    </div>
    <!-- /.widget-user -->
  </div>
</div>

@if(count($items)>0)
<div class="row">
  @foreach($items as $item)
  <div class="col-md-4">
    <div class="box box-primary box-solid">
      <div class="box-header with-border">
        <h3 class="box-title">Item No. {{ $item->id }}</h3>
        <!-- /.box-tools -->
      </div>
      <!-- /.box-header -->
      <div class="box-body" style="display: block;">
        <div class="row">
          <div class="col-md-12">
            <p><img src="{{ asset('storage/'.$item->thumbnail_path) }}" class="img-responsive img-thumbnail" width="100%"></p>
            <a href="{{ action('BoothController@items', $item->id) }}" class="btn btn-block btn-primary">View Details</a>
            <p class="text-right"><span class="lead">Php. {{ number_format($item->amount, 2) }} ({{ $item->unit }})</span><br>
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
