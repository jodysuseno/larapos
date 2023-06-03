@extends('temp.main')

@section('container')
<div class="row">
  <div class="col-md-6">
    <div class="tile">
      <h3 class="tile-title">Profile</h3>
      <form class="form-horizontal" action="{{ route('profile.update') }}" method="post">
      @csrf
        <div class="tile-body">
          @if (session('status'))
            <div class="bs-component">
                <div class="alert alert-dismissible alert-success">
                    <button class="close" type="button" data-dismiss="alert">×</button>{{ session('status') }}
                </div>
            </div>    
          @endif
          <div class="form-group row">
            <label class="control-label col-md-3">Username</label>
            <div class="col-md-8">
              <input class="form-control @error('username') is-invalid @enderror" type="text" name="username" id="username" value="{{ old('username', $profile->username) }}">
              @error('username')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3">Email</label>
            <div class="col-md-8">
              <input class="form-control @error('email') is-invalid @enderror col-md-8" type="email" name="email" id="email" value="{{ old('email', $profile->email) }}">
              @error('email')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3">Password</label>
            <div class="col-md-8">
              <input class="form-control col-md-8" type="password" name="password" id="password" value="{{ old('password')}}">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3">Confirm Password</label>
            <div class="col-md-8">
              <input class="form-control @error('confirm_password') is-invalid @enderror col-md-8" type="password" name="confirm_password" id="confirm_password" value="{{ old('confirm_password')}}">
              @error('confirm_password')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3">Name</label>
            <div class="col-md-8">
              <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name', $profile->name) }}">
              @error('name')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3">Address</label>
            <div class="col-md-8">
              <textarea class="form-control @error('address') is-invalid @enderror" rows="4" name="address" id="address">{{ old('address', $profile->address) }}</textarea>
              @error('address')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
        </div>
        <div class="tile-footer">
          <div class="row">
            <div class="col-md-8 col-md-offset-3">
              <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection