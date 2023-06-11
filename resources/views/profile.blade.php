@extends('temp.main')

@section('container')
<div class="row">
  <div class="col-md-4">
    <div class="tile">
      <h3 class="tile-title">Profile Picture </h3>
      <form class="form-horizontal" action="{{ route('profile.upload') }}" method="post" enctype="multipart/form-data">
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
            <div class="col-md-12">
              {{-- <div class="text-center"> --}}
                <img src="
                @if ($profile->profile_picture == 'default_user.png')
                {{ asset('images/default_user.png') }}
                @else
                {{ asset('images/'. $profile->profile_picture) }}
                @endif
                " class="rounded-circle img-thumbnail mx-auto d-block mb-3" alt="User Profile Picture">
              {{-- </div> --}}
              <label class="control-label">Profile Picture</label>
              <input class="form-control @error('profile_picture') is-invalid @enderror" type="file" name="profile_picture" id="profile_picture" value="{{ old('profile_picture', $profile->profile_picture) }}" required>
              @error('profile_picture')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
              <small class="text-warning"> <i class="fa fa-info"></i> It is recommended to use photos of the same height and length. </small>
            </div>
          </div>
        </div>
        <div class="tile-footer">
          <div class="row">
            <div class="col-md-8 col-md-offset-3">
              <button class="btn btn-primary" type="submit">Change Profile</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="col-md-8">
    <div class="tile">
      <h3 class="tile-title">Profile Data</h3>
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
              <input class="form-control col-lg-8 @error('username') is-invalid @enderror" type="text" name="username" id="username" value="{{ old('username', $profile->username) }}">
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
          <hr>
          <h4>Change Password</h4>
          <small class="form-text text-muted mb-3" id="fileHelp">Leave the field blank if you don't change the password.</small>
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