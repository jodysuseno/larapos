@extends('temp.main')

@section('container')
<div class="app-title">
  <div>
    <h1><i class="{{ $icon }}"></i> {{ $title }}</h1>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <form method="post" action="{{ route('item.update', $item->item_id) }}">
      @method('patch')
      @csrf
      <div class="tile">
        <div class="tile-body">
          <div class="form-group">
            <label class="control-label">barcode</label>
            <input class="form-control @error('barcode') is-invalid @enderror" value="{{ old('barcode', $item->barcode) }}" name="barcode" type="text">
            @error('barcode')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="tile-body">
          <div class="form-group">
            <label class="control-label">Name</label>
            <input class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $item->name) }}" name="name" type="text">
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="form-group">
          <label for="exampleSelect1">Category</label>
          <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="exampleSelect1">
            @foreach ($categories as $category)
            <option value="{{ $category->category_id }}" {{ $category->category_id == $item->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
          </select>
          @error('category_id')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        
        <div class="form-group">
          <label for="exampleSelect2">Unit</label>
          <select class="form-control @error('unit_id') is-invalid @enderror" name="unit_id" id="exampleSelect2">
            @foreach ($units as $unit)
            <option value="{{ $unit->unit_id }}" {{ $unit->unit_id == $item->unit_id ? 'selected' : '' }}>{{ $unit->name }}</option>
            @endforeach
          </select>
          @error('unit_id')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="tile-body">
          <div class="form-group">
            <label class="control-label">Price (IDR)</label>
            <input class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $item->price) }}" name="price" type="number">
            @error('price')
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
