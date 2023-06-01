@extends('temp.main')

@section('container')
<div class="app-title">
  <div>
    <h1><i class="{{ $icon }}"></i> {{ $title }}</h1>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <form method="post" action="{{ route('stock-in.store') }}">
      @csrf
      <div class="tile">
        <div class="tile-body">
          <div class="form-group">
            <label class="control-label">Date</label>
            <input readonly class="form-control @error('date') is-invalid @enderror" value="{{ date_format(date_create(date("Y-m-d")),"d/m/Y") }}" name="date" type="text">
            @error('date')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label class="control-label">Barcode</label>
            <div class="input-group">
              <input type="hidden" name="item_id" id="item_id" class="form-control @error('item_id') is-invalid @enderror" value="{{ old('item_id') }}">
              <input readonly name="barcode" id="barcode" type="text" class="form-control @error('barcode') is-invalid @enderror" value="{{ old('barcode') }}" >
              <div class="input-group-append">
                <button class="btn btn-outline-secondary" data-toggle="modal" data-target="#exampleModal" type="button">Search Item</button>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-group">
              <label class="control-label">Item Name</label>
              <input readonly id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" name="name" type="text">
              @error('name')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="row">
            <div class="col-md-8">
              <div class="form-group">
                <label class="control-label">Item unit</label>
                <input readonly id="unit_name" class="form-control @error('unit_name') is-invalid @enderror" value="{{ old('unit_name') }}" name="unit_name" type="text">
                @error('unit_name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="control-label">Initial Stock</label>
                <input readonly id="stock" class="form-control @error('stock') is-invalid @enderror" value="{{ old('stock') }}" name="stock" type="text">
                @error('stock')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label">Detail</label>
            <input placeholder="Restock barang" class="form-control @error('detail') is-invalid @enderror" value="{{ old('detail') }}" name="detail" type="text">
            @error('detail')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleSelect2">Supplier</label>
            <select name="supplier_id" class="form-control selectpicker  @error('supplier_id') is-invalid @enderror" data-live-search="true">
              @foreach ($suppliers as $supplier)
              <option value="{{ $supplier->supplier_id }}">{{ $supplier->name }}</option>
              @endforeach
            </select>
            @error('supplier_id')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label class="control-label">Quantity</label>
            <input class="form-control @error('qty') is-invalid @enderror" value="{{ old('qty') }}" name="qty" type="number">
            @error('qty')
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
@error('item_id')
<script>
  alert('Select item first!');
</script>
{{-- <div class="invalid-feedback">{{ $message }}</div> --}}
@enderror
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
          <table class="table table table-sm table-hover table-bordered" id="sampleTable">
            <thead>
              <tr>
                <th>No</th>
                <th>Barcode</th>
                <th>Name</th>
                <th>Unit</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($items as $item)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->barcode }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->unit_name }}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->stock }}</td>
                <td align="center">
                  <button 
                    id="select"
                    class="btn btn-info btn-xs"
                    data-id = {{ $item->item_id }}
                    data-barcode = "{{ $item->barcode }}"
                    data-name = "{{ $item->name }}"
                    data-unit_name = "{{ $item->unit_name }}"
                    data-stock = "{{ $item->stock }}"
                    >
                    <i class="fa fa-check"></i>
                    Pilih
                  </button>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
