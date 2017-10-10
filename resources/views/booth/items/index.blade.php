@extends('layouts.main')

@section('title', 'SVJX Ukay-Ukay | Booth Items')

@section('content-header')
<h1><i class="fa fa-info-circle"></i> Item Details</h1>
<ol class="breadcrumb">
  <li><a href="{{ action('BoothController@index') }}"><i class="fa fa-home"></i> Home</a></li>
  <li class="active">Item Details</li>
</ol>
@endsection

@section('content')

<div class="row">

  <div class="col-md-12">
    <div class="box box-primary box-solid">
      <div class="box-header with-border">
        <h3 class="box-title">Item No. {{ $item->id }}</h3>
        <div class="box-tools pull-right">
          <a href="{{ URL::previous() }}" class="btn btn-box-tool">Back</a>
        </div>
        <!-- /.box-tools -->
      </div>
      <!-- /.box-header -->
      <div class="box-body" style="display: block;">
        <div class="row">
          <div class="col-md-12">
            <div id="myCarousel" class="carousel slide">
              <ol class="carousel-indicators">
                @foreach($item->photos as $key => $p)
                <li data-target="#myCarousel" data-slide-to="{{ $key }}" class="{{ $key==0 ? 'active' : null }}"></li>
                @endforeach
              </ol>
              <!-- Carousel items -->
              <div class="carousel-inner">
                @foreach($item->photos as $key => $p)
                <div class="{{ $key==0 ? 'active' : null }} item">
                  <img src="{{ asset($p->photo) }}" class="img-responsive img-thumbnail" width="100%">
                </div>
                @endforeach
              </div>
              <!-- Carousel nav -->
              <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
              <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
            </div>
          </div>
          <div class="col-md-12">
            <p class="text-right"><span class="lead">Php. {{ number_format($item->amount, 2) }} / {{ $item->unit->id }}</span><br>
              <a href="{{ action('BoothController@sellerItems', $item->user->id) }}"><small><i class="fa fa-user"></i> {{ $item->user->name }}</small></a></p>
            <p><strong>Short Description</strong></p>
            <p>{{ $item->short_description }}</p>
            <p><strong>Full Description</strong></p>
            {!! html_entity_decode($item->description) !!}
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="fb-like"
              data-href="{{ url()->current() }}"
              data-layout="standard"
              data-action="like"
              data-size="large"
              data-show-faces="true"
              data-share="true"></div>
          </div>
          <div class="col-md-12">
            <div class="fb-comments" data-href="{{ url('/') }}" data-width="100%" data-numposts="5"></div>
          </div>
        </div>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>

</div>

@endsection


@section('scripts')
<script type="text/javascript">
$(function() {

});
</script>
@endsection
