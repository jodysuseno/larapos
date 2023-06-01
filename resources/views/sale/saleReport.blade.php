@extends('temp.main')

@section('container')
<div class="app-title">
  <div>
    <h1><i class="{{ $icon }}"></i> {{ $title }}</h1>
  </div>
</div>
<div class="row">
  {{-- <div class="col-md-12">
    <div class="tile">
      <div class="tile-body">
        <form method="POST" action="{{ route('sale.filter') }}">
          @csrf
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">Sale Date</span>
            </div>
            <input type="date" aria-label="First date" name="first_date" class="form-control">
            <input type="date" aria-label="Last date" name="last_date" class="form-control">
            <div class="input-group-append">
              <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Filter</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div> --}}
  <div class="col-md-12">
    <div class="tile">
      <div class="tile-body">
        <a href="{{ route('sale.pdf') }}" target="_blank" class="btn btn-primary"><i class="fa fa-file-text"></i> Print</a>
        <br>
        <br>
        <div class="table-responsive">
          <table class="table table-sm table-hover table-bordered" id="sampleTable">
            <thead>
              <tr>
                <th>No</th>
                <th>Invoice</th>
                <th>Date</th>
                <th>Customer</th>
                <th>Cashier</th>
                <th>Total</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($sales as $sale)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $sale->invoice }}</td>
                <td>{{ date_format(date_create($sale->date),"d/m/Y") }}</td>
                <td>{{ $sale->customer_name }}</td>
                <td>{{ $sale->cashier_name }}</td>
                <td>{{ $sale->total_price }}</td>
                <td align="center">
                  <form class="d-inline" action="{{ route('sale.page-invoice', $sale->sale_id) }}"
                    method="POST">
                    @method('get')
                    @csrf
                    <button class="btn btn-info btn-xs"><i class="icon fa fa-eye"></i> Invoice</button>
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
@endsection