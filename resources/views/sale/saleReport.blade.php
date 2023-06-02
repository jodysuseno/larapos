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
        <form method="POST" action="{{ route('sale.filter') }}">
        @csrf
          <div class="row justify-content-center align-items-center g-2">
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="form-group">
                <label for="">Month</label>
                <div class="input-group">
                  <input type="month" aria-label="Select Month" name="month" value="{{ request()->get('get_month') }}" class="form-control">
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="form-group">
                <label for="user_id" class="form-label">Cashier</label>
                <select name="user_id" id="user_id" class="form-control selectpicker" data-live-search="true">
                  <option value="">Select Cashier</option>
                  @foreach ($cashier as $item)
                  <option @if (request()->get('get_cshr') == $item->id) selected @endif value={{ $item->id }}>{{ $item->name }}</option>
                  @endforeach
                </select>
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
        @if ($sales->count() > 0)
        <div class="row text-right g-2">
          <div class="col-12">
            <form action="{{ route('sale.pdf') }}" method="post" target="_blank">
              @csrf
              <input type="hidden" name="get_month" value="{{ request()->get('get_month') }}">
              <input type="hidden" name="get_cshr" value="{{ request()->get('get_cshr') }}">
              <button type="submit" class="btn btn-primary"><i class="fa fa-file-text"></i> Print</button>
            </form>
          </div>
        </div>
        @endif
      </div>
    </div>
  </div>
  <div class="col-md-12">
    <div class="tile">
      <div class="tile-body">
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