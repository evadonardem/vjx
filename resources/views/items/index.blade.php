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

<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title"></h3>
    <div class="box-tools pull-right">
      <a href="{{ action('ItemController@create') }}" class="btn btn-box-tool"><i class="fa fa-plus-circle"></i> New Item</a>
    </div>
    <!-- /.box-tools -->
  </div>
  <!-- /.box-header -->
  <div class="box-body">
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
              <div class="col-md-6">
                <p><strong>Short Description</strong></p>
                <p>{{ $item->short_description }}</p>
                {!! html_entity_decode($item->description) !!}
                <h1>Php.{{ number_format($item->amount, 2) }} / {{ $item->unit->id }}</h1>
                <div class="btn-group">
                  <button type="button" id="item{{ $item->id }}" class="item-sold btn btn-primary btn-flat"><i class="fa fa-check-circle"></i> Sold</button>
                  <a href="{{ action('ItemController@edit', $item->id) }}" class="btn btn-warning btn-flat"><i class="fa fa-edit"></i> Edit</a>
                  <a href="{{ action('ItemController@destroy', $item->id) }}" class="item-delete btn btn-danger btn-flat"><i class="fa fa-trash"></i> Delete</a>
                  {{ csrf_field() }}
                </div>
              </div>
              <div class="col-md-6">
                <div id="myCarousel{{$item->id}}" class="carousel slide">
                  <ol class="carousel-indicators">
                    @foreach($item->photos as $key => $p)
                    <li data-target="#myCarousel{{$item->id}}" data-slide-to="{{ $key }}" class="{{ $key==0 ? 'active' : null }}"></li>
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
                </div>
              </div>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <!-- /.box-body -->
  <div class="box-footer">

  </div>
  <!-- /.box-footer -->
</div>
<!-- /.box -->

@endsection


@section('scripts')
<!-- Data Tables -->
<link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables/dataTables.bootstrap.css') }}">
<script type="text/javascript" src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('adminlte/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>

<script type="text/javascript">
$(function() {
  $('body').on('click', '.item-delete', function(e) {
    var ref = $(this);
    e.preventDefault();

    $('body').find('#deleteItemDialog').remove();

    var modal = $('<div id="deleteItemDialog" class="modal modal-danger"/>');
    var modalDialog = $('<div class="modal-dialog"/>');
    var modalContent = $('<div class="modal-content"/>');
    var modalHeader = $('<div class="modal-header"/>');
    var modalBody = $('<div class="modal-body"/>');
    var modalFooter = $('<div class="modal-footer"/>');

    modalHeader.append($('<button class="close" data-dismiss="modal" aria-label="Close"/>').append($('<i class="fa fa-close" aria-hidden="true"></i>')));
    modalHeader.append($('<h4 class="modal-title"/>').html('<i class="fa fa-trash"></i> Delete Item'));

    modalBody.append($('<p/>').text('Are you sure to delete this item?'));

    modalFooter.append($('<button class="btn btn-outline pull-left" data-dismiss="modal"/>').text('Close'));
    modalFooter.append($('<button class="ok-btn btn btn-outline"/>').text('OK'));

    modalContent.append(modalHeader);
    modalContent.append(modalBody);
    modalContent.append(modalFooter);
    modalDialog.append(modalContent);
    modal.append(modalDialog);

    $('body').append(modal);
    modal.find('.ok-btn').off().click(function() {
      $.post(ref.prop('href'), { '_method' : 'DELETE', '_token' : $('[name="_token"]').val()}, function() {
        location.href = location.href;
      });
    });
    modal.modal();
  });

  $('body').on('click', '.item-sold', function(e) {
    var ref = $(this);

    $('body').find('#soldItemDialog').remove();

    var modal = $('<div id="soldItemDialog" class="modal modal-primary"/>');
    var modalDialog = $('<div class="modal-dialog"/>');
    var modalContent = $('<div class="modal-content"/>');
    var modalHeader = $('<div class="modal-header"/>');
    var modalBody = $('<div class="modal-body"/>');
    var modalFooter = $('<div class="modal-footer"/>');

    modalHeader.append($('<button class="close" data-dismiss="modal" aria-label="Close"/>').append($('<i class="fa fa-close" aria-hidden="true"></i>')));
    modalHeader.append($('<h4 class="modal-title"/>').html('<i class="fa fa-check-circle"></i> Item Sold'));

    modalBody.append($('<p/>').text('Are you sure to mark this item sold?'));

    modalFooter.append($('<button class="btn btn-outline pull-left" data-dismiss="modal"/>').text('Close'));
    modalFooter.append($('<button class="ok-btn btn btn-outline"/>').text('OK'));

    modalContent.append(modalHeader);
    modalContent.append(modalBody);
    modalContent.append(modalFooter);
    modalDialog.append(modalContent);
    modal.append(modalDialog);

    $('body').append(modal);
    modal.find('.ok-btn').off().click(function() {
      var token = "{{ Auth::user()->api_token }}";
      var itemID = ref.prop('id').replace('item', '');
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
    modal.modal();
  });

  $('table').DataTable();
});
</script>
@endsection
