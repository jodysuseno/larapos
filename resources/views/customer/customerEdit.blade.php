@extends('temp.main')

@section('container')
<div class="app-title">
  <div>
    <h1><i class="{{ $icon }}"></i> {{ $title }}</h1>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <form method="post" action="{{ route('customer.update', $customers->customer_id) }}">
      @method('patch')
      @csrf
      <div class="tile">
        <div class="tile-body">
          <div class="form-group">
            <label class="control-label">Name</label>
            <input class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $customers->name) }}" name="name" type="text">
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label class="control-label">Gender</label>
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="radio" name="gender" value="male" 
                @if ($customers->gender == 'male')
                  checked  
                @endif>Male
              </label>
            </div>
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="radio" name="gender" value="female" 
                @if ($customers->gender == 'female')
                  checked  
                @endif>Female
              </label>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label">Phone</label>
            <input class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone',$customers->phone) }}" name="phone" type="number">
            @error('phone')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label class="control-label">Address</label>
            <textarea class="form-control @error('address') is-invalid @enderror" rows="4" name="address">{{ old('address',$customers->address) }}</textarea>
            @error('address')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="tile-footer">
          <button class="btn btn-primary" type="sublit"><i
              class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
          &nbsp;&nbsp;&nbsp;
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
