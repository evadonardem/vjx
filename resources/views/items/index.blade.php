@extends('layouts.main')

@section('title', 'Items')

@section('content-header')
<h1>
  My Items
  <small>List of all available / unsold items</small>
</h1>
<ol class="breadcrumb">
  <li><a href="{{ action('DashboardController@index') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
  <li class="active">My Items</li>
</ol>
@endsection

@section('content')
<div class="text-right">
  <a href="{{ action('ItemController@create') }}" class="btn btn-primary">Add Item</a>
</div>
<br>

<table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>Item</th>
    </tr>
  </thead>
  <tbody>
    @foreach($items as $item)
    <tr>
      <td>
        <div class="row">
          <div class="col-md-4">
            <img src="{{ asset('storage/'.$item->thumbnail_path) }}" class="img-responsive img-thumbnail" width="100%">
          </div>
          <div class="col-md-8">
            {!! html_entity_decode($item->description) !!}
            <h1>Php.{{ number_format($item->amount, 2) }}</h1>
            <div class="btn-group">
              <button type="button" id="item{{ $item->id }}" class="item-sold btn btn-lg btn-primary btn-flat"><i class="fa fa-check-circle"></i> Sold</button>            
              <a href="{{ action('ItemController@edit', $item->id) }}" class="btn btn-lg btn-warning btn-flat" data-toggle="tooltip" data-original-title="Edit Item"><i class="fa fa-edit"></i> Edit</a>
              <a href="{{ action('ItemController@destroy', $item->id) }}" class="item-delete btn btn-lg btn-danger btn-flat" data-toggle="tooltip" data-original-title="Delete Item"><i class="fa fa-trash"></i> Delete</a>
              {{ csrf_field() }}
            </div>
          </div>
        </div>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection


@section('scripts')
<!-- Data Tables -->
<link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables/dataTables.bootstrap.css') }}">
<script type="text/javascript" src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('adminlte/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>

<script type="text/javascript">
$(function() {
  $('body').on('click', '.item-delete', function(e) {
    e.preventDefault();
    $.post($(this).prop('href'), { '_method' : 'DELETE', '_token' : $('[name="_token"]').val()}, function() {
      location.href = location.href;
    });
  });
  $('body').on('click', '.item-sold', function(e) {
    var token = "{{ Auth::user()->api_token }}";
    var itemID = $(this).prop('id').replace('item', '');
    $.ajax({
      url: "{{ url('api/sold') }}/" + itemID,
      dataType: 'json',
      headers: {
        'Authorization':'Bearer ' + token,
      },
      type: 'get',
      success: function(data) {
        location.href = location.href;
      }
    });
  });
  $('table').DataTable();
});
</script>
@endsection
