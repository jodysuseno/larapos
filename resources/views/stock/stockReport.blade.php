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
        <form method="POST" action="{{ route('stock.filter') }}">
          @csrf
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">Date</span>
            </div>
            <input type="date" aria-label="First date" name="first_date" class="form-control" required>
            <input type="date" aria-label="Last date" name="last_date" class="form-control" required>
            <div class="input-group-append">
              <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Filter</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="col-md-12">
    <div class="tile">
      <div class="tile-body">
        <nav>
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-link active" id="stock-in" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Stock In</a>
            <a class="nav-link" id="stock-out" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Stock Out</a>
          </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
          <br>
          <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="stock-in">
            <a href="{{ route('stockin.pdf') }}" target="_blank" class="btn btn-primary"><i class="fa fa-file-text"></i> Print</a>
            <br>
            <br>
            <div class="table-responsive">
              <table class="table table table-sm table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Barcode</th>
                    <th>Date</th>
                    <th>Product Item</th>
                    <th>Quantity</th>
                    <th>Detail</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($stockIns as $stockIn)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $stockIn->item_barcode }}</td>
                      <td>{{ date_format(date_create($stockIn->date),"d/m/Y") }}</td>
                      <td>{{ $stockIn->product_item }}</td>
                      <td>{{ $stockIn->qty }}</td>
                      <td>{{ $stockIn->detail }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="stock-out">
            <a href="{{ route('stockout.pdf') }}" target="_blank" class="btn btn-primary"><i class="fa fa-file-text"></i> Print</a>
            <br>
            <br>
            <div class="table-responsive">
              <table class="table table table-sm table-hover table-bordered" id="sampleTable1">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Barcode</th>
                    <th>Date</th>
                    <th>Product Item</th>
                    <th>Quantity</th>
                    <th>Detail</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($stockOuts as $stockOut)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $stockOut->item_barcode }}</td>
                      <td>{{ date_format(date_create($stockOut->date),"d/m/Y") }}</td>
                      <td>{{ $stockOut->product_item }}</td>
                      <td>{{ $stockOut->qty }}</td>
                      <td>{{ $stockOut->detail }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection