@extends('temp.main')

@section('container')
<div class="app-title">
  <div>
    <h1><i class="{{ $icon }}"></i> {{ $title }}</h1>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <form method="post" action="{{ route('supplier.update', $supplier->supplier_id) }}">
      @method('patch')
      @csrf
      <div class="tile">
        <div class="tile-body">
          <div class="form-group">
            <label class="control-label">Name</label>
            <input class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $supplier->name) }}" name="name" type="text">
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label class="control-label">Phone</label>
            <input class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', $supplier->phone) }}" name="phone" type="number">
            @error('phone')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label class="control-label">Address</label>
            <textarea class="form-control @error('address') is-invalid @enderror" rows="4" name="address">{{ old('address', $supplier->address) }}</textarea>
            @error('address')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label class="control-label">Description</label>
            <textarea class="form-control @error('desc') is-invalid @enderror" rows="4" name="desc">{{ old('desc', $supplier->desc) }}</textarea>
            @error('desc')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
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
