@extends('temp.main')

@section('container')
<div class="app-title">
  <div>
    <h1><i class="{{ $icon }}"></i> {{ $title }}</h1>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <form method="post" action="/user">
      @csrf
      <div class="tile">
        <div class="tile-body">
          <div class="form-group">
            <label class="control-label">Email</label>
            <input class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email" type="email">
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label class="control-label">Username</label>
            <input class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" name="username" type="text">
            @error('username')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label class="control-label">Password</label>
            <input class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" name="password" type="password">
            @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label class="control-label">Repassword</label>
            <input class="form-control @error('password_confirmation') is-invalid @enderror" value="{{ old('password_confirmation') }}" name="password_confirmation" type="password">
            @error('password_confirmation')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label class="control-label">Name</label>
            <input class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" name="name" type="text">
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label class="control-label">Address</label>
            <textarea class="form-control @error('address') is-invalid @enderror" rows="4" name="address">{{ old('address') }}</textarea>
            @error('address')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleSelect1">Level</label>
            <select class="form-control" name="level" id="exampleSelect1">
              <option value="cashier">cashier</option>
              <option value="admin">Admin</option>
            </select>
          </div>
        </div>
        <div class="tile-footer">
          <button class="btn btn-primary" type="sublit"><i
              class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
          &nbsp;&nbsp;&nbsp;
          <button class="btn btn-primary" type="reset"><i
              class="fa fa-fw fa-lg fa-times-circle"></i>Reset</button>
          {{-- <a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a> --}}
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
