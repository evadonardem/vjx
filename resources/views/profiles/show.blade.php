@extends('layouts.main')

@section('title', 'My Profile')

@section('content')
<div class="row">
  <div class="col-md-3">
    <!-- Profile Image -->
    <div class="box box-primary">
      <div class="box-body box-profile">
        <img class="profile-user-img img-responsive img-circle" src="{{ asset('images/photo_placeholder.jpg') }}" alt="User profile picture">

        <h3 class="profile-username text-center">{{ $user->name }}</h3>

        <p class="text-muted text-center">Seller</p>

        <ul class="list-group list-group-unbordered">
          <li class="list-group-item">
            <b>Items</b> <a class="pull-right">{{ count($user->items) }}</a>
          </li>
          <li class="list-group-item">
            <b>Following</b> <a class="pull-right">543</a>
          </li>
          <li class="list-group-item">
            <b>Friends</b> <a class="pull-right">13,287</a>
          </li>
        </ul>

        <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </div>
  <div class="col-md-9">

    <?php
      $arr = [true, false];
      if($errors->has('current_password') || $errors->has('new_password') || $errors->has('new_password_confirmation')) {
        $arr = [false, true];
      }
    ?>

    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="{{ $arr[0] ? 'active' : '' }}"><a href="#settings" data-toggle="tab" {{ $arr[0] ? 'aria-expanded="true"' : '' }} >Settings</a></li>
        <li class="{{ $arr[1] ? 'active' : '' }}"><a href="#changePassword" data-toggle="tab" {{ $arr[1] ? 'aria-expanded="true"' : '' }}>Change Password</a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane {{ $arr[0] ? 'active' : '' }}" id="settings">
          <form class="form-horizontal">
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Name</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" placeholder="Name" value="{{ $user->name }}" readonly>
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail" class="col-sm-2 control-label">Email</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" placeholder="Email" value="{{ $user->email }}" readonly>
              </div>
            </div>
          </form>
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane {{ $arr[1] ? 'active' : '' }}" id="changePassword">
          <form class="form-horizontal" action="{{ action('ProfileController@changePassword') }}" method="post">
            <div class="form-group {{ $errors->has('current_password') ? 'has-error' : '' }}">
              <label for="inputName" class="col-sm-2 control-label">Old Password</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" name="current_password" placeholder="Old Password">
                @if ($errors->has('current_password'))
                    <span class="help-block">{{ $errors->first('current_password') }}</span>
                @endif
              </div>
            </div>
            <div class="form-group {{ $errors->has('new_password') ? 'has-error' : '' }}">
              <label for="inputEmail" class="col-sm-2 control-label">New Password</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" name="new_password" placeholder="New Password">
                @if ($errors->has('new_password'))
                    <span class="help-block">{{ $errors->first('new_password') }}</span>
                @endif
              </div>
            </div>
            <div class="form-group {{ $errors->has('new_password_confirmation') ? 'has-error' : '' }}">
              <label for="inputEmail" class="col-sm-2 control-label">Confirm New Password</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" name="new_password_confirmation" placeholder="Confirm New Password">
                @if ($errors->has('new_password_confirmation'))
                    <span class="help-block">{{ $errors->first('new_password_confirmation') }}</span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary pull-right">Update</button>
              </div>
            </div>
          </form>
        </div>
        <!-- /.tab-pane -->
      </div>
      <!-- /.tab-content -->
    </div>
    <!-- /.nav-tabs-custom -->
  </div>
</div>

@endsection

@section('scripts')
<!-- Bootstrap WYSIHTML5 -->
<link rel="stylesheet" href="{{ asset('adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
<script type="text/javascript" src="{{ asset('adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<script type="text/javascript">
  $(function() {

  });
</script>
@endsection
