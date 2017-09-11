@extends('layouts.main')

@section('title', 'SVJX Ukay-Ukay | Home')

@section('content-header')
<h1><i class="fa fa-dashboard"></i> Dashboard</h1>
@endsection

@section('content')

<div class="row">
  <div class="col-md-6">
    <!-- Widget: user widget style 1 -->
    <div class="box box-widget widget-user">
      <!-- Add the bg color to the header using any of the bg-* classes -->
      <div class="widget-user-header bg-red-active">
        <h3 class="widget-user-username">{{ Auth::user()->name }}</h3>
        <h5 class="widget-user-desc">Member ID: {{ Auth::user()->id }}</h5>
      </div>
      <div class="widget-user-image">
        <img class="img-circle" src="{{ asset('storage/images/photo_placeholder.jpg') }}" alt="User Avatar">
      </div>
      <div class="box-footer">
        <div class="row">
          <div class="col-sm-4 border-right">
            <div class="description-block">
              <h5 class="description-header">3,200</h5>
              <span class="description-text">SALES</span>
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
              <h5 class="description-header">35</h5>
              <span class="description-text">PRODUCTS</span>
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
  <div class="col-md-6">
    <!-- small box -->
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3>{{ count(Auth::user()->items->where('sold_at', NULL)) }}</h3>
        <p>My Items (Available / Unsold)</p>
      </div>
      <div class="icon">
        <i class="fa fa-list"></i>
      </div>
      <a href="{{ action('ItemController@index') }}" class="small-box-footer">
        More Info <i class="fa fa-list"></i>
      </a>
    </div>
  </div>
</div>

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
