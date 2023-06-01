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
      <div class="tile-body">
        @if (session('status'))
          <div class="bs-component">
              <div class="alert alert-dismissible alert-success">
                  <button class="close" type="button" data-dismiss="alert">×</button>{{ session('status') }}
              </div>
          </div>    
        @endif
        @if ($title == 'Stock In')
          <a href="/stock-in/add" class="btn btn-primary btn-sm mb-3"><i class="icon fa fa-plus"></i> Add {{ $title }}</a>
        @elseif ($title == 'Stock Out')
          <a href="/stock-out/add" class="btn btn-primary btn-sm mb-3"><i class="icon fa fa-plus"></i> Add {{ $title }}</a>
        @endif
        <div class="table-responsive">
          <table class="table table table-sm table-hover table-bordered" id="sampleTable">
            <thead>
              <tr>
                <th>No</th>
                <th>Barcode</th>
                <th>Product Item</th>
                <th>Quantity</th>
                <th>Detail</th>
                <th>Date</th>
                <th>Option</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($stocks as $stock)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $stock->item_barcode }}</td>
                  <td>{{ $stock->product_item }}</td>
                  <td>{{ $stock->qty }}</td>
                  <td>{{ $stock->detail }}</td>
                  <td>{{ date_format(date_create($stock->date),"d/m/Y") }}</td>
                  <td align="center">
                    @if ($title == 'Stock In')
                    <button 
                      class="btn btn-secondary btn-xs" 
                      data-toggle="modal" 
                      data-target="#exampleModal" 
                      type="button"
                      id="detail"
                      data-barcode = "{{ $stock->item_barcode }}"
                      data-item_name = "{{ $stock->product_item }}"
                      data-detail_b = "{{ $stock->detail }}"
                      data-supplier = "{{ $stock->supplier_name }}"
                      data-qty = "{{ $stock->qty }}"
                      data-date = "{{ $stock->date }}"
                      >
                      <i class="icon fa fa-eye"></i>
                      Detail
                    </button>
                    @endif
                    <form class="d-inline" 
                      @if ($title == 'Stock In')
                      action="{{ route('stock-in.destroy',$stock->stock_id) }}"
                      @elseif ($title == 'Stock Out')
                      action="{{ route('stock-out.destroy',$stock->stock_id) }}"
                      @endif 
                      method="POST" onsubmit="return confirm('Are you sure to delete the data?')">
                      @method('delete')
                      @csrf
                      <button class="btn btn-danger btn-xs"><i class="icon fa fa-trash"></i> Delete</button>
                    </form>
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

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Stock In Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="sampleTable">
            <tbody>
              <tr>
                <td><b>Barcode</b></td>
                <td><span id="barcode"></span></td>
              </tr>
              <tr>
                <td><b>Item Name</b></td>
                <td><span id="item_name"></span></td>
              </tr>
              <tr>
                <td><b>Detail</b></td>
                <td><span id="detail_b"></span></td>
              </tr>
              <tr>
                <td><b>Supplier</b></td>
                <td><span id="supplier"></span></td>
              </tr>
              <tr>
                <td><b>Quantity</b></td>
                <td><span id="qty"></span></td>
              </tr>
              <tr>
                <td><b>Date</b></td>
                <td><span id="date"></span></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection