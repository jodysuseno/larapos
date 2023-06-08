@extends('temp.main')

@section('container')
<div class="app-title">
  <div>
    <h1><i class="{{ $icon }}"></i> {{ $title }}</h1>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="tile">
      @if (session('status'))
        <div class="bs-component">
            <div class="alert alert-dismissible alert-success">
                <button class="close" type="button" data-dismiss="alert">×</button>{{ session('status') }}
            </div>
        </div>    
      @endif
      <form method="post" action="{{ route('configuration_update') }}">
      @csrf
      <div class="row">
        <div class="col-lg-6">
          <div class="form-group">
            <label class="control-label">Shop Name</label>
            <input class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $setting->name) }}" name="name" type="text" required>
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label class="control-label">Contact</label>
            <input class="form-control @error('contact') is-invalid @enderror" value="{{ old('contact', $setting->contact) }}" name="contact" type="number" required>
            @error('contact')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label class="control-label">Owner Name</label>
            <input class="form-control @error('owner') is-invalid @enderror" value="{{ old('owner', $setting->owner) }}" name="owner" type="text" required>
            @error('owner')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="col-lg-6">
          <div class="form-group">
            <label class="control-label">Shop Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" rows="8" name="description" required>{{ old('description', $setting->description) }}</textarea>
            @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>
      </div>
      <div class="tile-footer text-right">
        <button class="btn btn-end btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endsection
