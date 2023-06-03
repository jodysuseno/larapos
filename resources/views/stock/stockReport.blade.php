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
          <div class="row justify-content-center align-items-center g-2">
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="form-group">
                <label for="">Month</label>
                <div class="input-group">
                  <input type="month" id="month" aria-label="Select Month" name="month" value="{{ request()->get('get_month') }}" class="form-control">
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="form-group">
                <label for="user_id" class="form-label">Status</label>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="form-check-input" name="type_in" value="in" type="checkbox" @if (request()->get('get_type_in') == 'in' ) checked @endif >Stock In
                  </label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="form-check-input" name="type_out" value="out"  type="checkbox" @if (request()->get('get_type_out') == 'out' ) checked @endif >Stock Out
                  </label>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="form-group">
                <label for="" class="form-label">Filter</label>
                <button type="submit" class="btn btn-block btn-primary">Filter</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="col-md-12">
    <div class="tile">
      <div class="tile-body">
        @if ($stock->count() > 0)
        <div class="row text-right g-2">
          <div class="col-12 mb-3">
            <form action="{{ route('stock.pdf') }}" method="post" target="_blank">
              @csrf
              <input type="hidden" name="get_month" id="get_month" value="{{ request()->get('get_month') }}">
              <input type="hidden" name="get_type_in" id="get_type_in" value="{{ request()->get('get_type_in') }}">
              <input type="hidden" name="get_type_out" id="get_type_out" value="{{ request()->get('get_type_out') }}">
              <button type="submit" class="btn btn-primary"><i class="fa fa-file-text"></i> Print</button>
            </form>
          </div>
        </div>
        @endif
        <div class="table-responsive">
          <table class="table table table-sm table-hover table-bordered" id="sampleTable">
            <thead>
              <tr>
                <th>No</th>
                <th>Barcode</th>
                <th>Date</th>
                <th>Product Item</th>
                <th>Quantity</th>
                <th>Status</th>
                <th>Detail</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($stock as $item)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $item->item_barcode }}</td>
                  <td>{{ date_format(date_create($item->date),"d/m/Y") }}</td>
                  <td>{{ $item->product_item }}</td>
                  <td>{{ $item->qty }}</td>
                  <td>Stock {{ $item->type }}</td>
                  <td>{{ $item->detail }}</td>
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