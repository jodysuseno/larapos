@extends('temp.main')

@section('container')
<style type="text/css">
  table tbody {
    counter-reset: row-num;
  }
  table tbody tr {
    counter-increment: row-num;
  }
  table tbody tr td:first-child::before {
      content: counter(row-num) ". ";
  }
</style>
<div class="app-title">
  <div>
    <h1><i class="{{ $icon }}"></i> {{ $title }}</h1>
  </div>
</div>
<form action="{{ route('sale.store') }}" method="post" target="_blank">
  @csrf
  <div class="row">
    <div class="col-md-6">
      <div class="tile">
        <div class="tile-body">
          <div class="form-group row">
            <label class="control-label col-md-3">Date</label>
            <div class="col-md-8">
              <input name="date" readonly class="form-control" type="text" value="{{ $date_now }}">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3">Casier</label>
            <div class="col-md-8">
              <input name="user_id" class="form-control" type="hidden" value="{{ auth()->user()->id }}">
              <input readonly class="form-control" type="text" value="{{ auth()->user()->name }}">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3">Customer</label>
            <div class="col-md-8">
              <select name="customer_id" class="form-control selectpicker" data-live-search="true">
                @foreach ($customers as $customer)
                  <option value="{{ $customer->customer_id }}">{{ $customer->name }}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="tile">
        <div class="tile-body">
          <div class="form-group">
          </div>
          <div class="row d-print-none mt-2">
            <div class="col-4 text-left">
              <h5>Invoice </h5>
            </div>
            <div class="col-8 text-right">
              <input type="hidden" name="invoice" value="{{ $invoice }}">
              <h5><b><span id="invoice">{{ $invoice }}</span></b></h5>
            </div>
          </div>
          <div class="row d-print-none mt-4">
            <div class="col-12 text-right">
              <h2><b><span id="grand_total" style="font-size: 50pt">0</span></b></h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <button class="btn btn-primary mb-4" data-toggle="modal" data-target="#exampleModal" type="button"><i class="fa fa-fw fa-lg fa-plus"></i>Add Item</button>
          <div class="table-responsive">
            <table class="table table-sm table-hover table-bordered" id="tb_sale">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Barcode</th>
                  <th>Product Item</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Total</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody id="add_row">
                {{-- <tr>
                  <td></td>
                  <td align="right"></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td align="right"></td>
                  <td align="right"></td>
                  <td></td>
                </tr> --}}
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="tile">
        <div class="tile-body">
            <div class="form-group row">
              <label class="control-label col-md-3">Sub total</label>
              <div class="col-md-8">
                <input name="all_total" readonly class="form-control" value="0" id="total_all" type="text">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">Cash</label>
              <div class="col-md-8">
                <input name="cash" class="form-control" 
                {{-- onkeyup="cash();" onchange="cash();" value="" 
                onkeypress='return event.charCode >= 48 && event.charCode <= 57'  --}}
                id="cash" type="number">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">Change</label>
              <div class="col-md-8">
                <input name="change" class="form-control" value="0" id="change" type="number" readonly>
              </div>
            </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="tile">
        <div class="tile-body">
          <div class="form-group row">
            <label class="control-label col-md-3">Note</label>
            <div class="col-md-8">
              <textarea name="note" class="form-control" name="" id="note" cols="30" rows="6"></textarea>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="tile">
        <div class="tile-body">
          <div class="form-group">
            <button id="btn-reset" class="btn btn-warning btn-block" 
            onclick="total();reset()" 
            type="reset">
            <i class="fa fa-fw fa-lg fa-refresh"></i>Cancel</button>
          </div>
          <div class="form-group">
            <button class="btn btn-primary btn-block" type="submit" ><i class="fa fa-fw fa-lg fa-paper-plane-o"></i>Proces Payment</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
          <div class="row">
            <div class="col-lg-3">
              <div class="form-group">
                <input class="form-control" id="barcode" type="text" readonly required>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="form-group">
                <input class="form-control" id="product_item" type="text" readonly required>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="form-group">
                <input class="form-control" onkeypress="return event.charCode >= 48 && event.charCode <= 57" id="qty" type="number" min="1" max="" value="1" disabled required>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="form-group">
                <input type="hidden" name="item_id" id="item_id" class="form-control">
                <input name="price" id="price" type="hidden">
                <input name="stock" id="stock" type="hidden">
                <button class="btn btn-primary btn-block" disabled onclick="add_item();total();cash()" id="add_item" type="button"><i class="fa fa-fw fa-lg fa-plus"></i>Add</button>
              </div>
            </div>
          </div>
          <hr>
          <table class="table table table-sm table-hover table-bordered" id="sampleTable">
            <thead>
              <tr>
                <th>No</th>
                <th>Barcode</th>
                <th>Name</th>
                {{-- <th>Unit</th> --}}
                <th>Price</th>
                <th>Stock</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($items as $item)
                @if ($item->stock > 0)
                  <tr>
                    <td></td>
                    <td>{{ $item->barcode }}</td>
                    <td>{{ $item->name }}</td>
                    {{-- <td>{{ $item->unit_name }}</td> --}}
                    <td>{{ $item->price }}</td>
                    <td id="qty_slc{{ $item->item_id }}" data-over="{{ $item->stock }}">{{ $item->stock }}</td>
                    <td align="center">
                      <button 
                        id="select-trx{{ $item->item_id }}"
                        class="btn btn-info btn-xs select-trx"
                        data-id = {{ $item->item_id }}
                        data-barcode = "{{ $item->barcode }}"
                        data-product_item = "{{ $item->name }}"
                        data-price = "{{ $item->price }}"
                        data-stock = "{{ $item->stock }}"
                        {{-- data-over_stock{{ $item->item_id }} = "{{ $item->stock }}" --}}
                        >
                        <i class="fa fa-check"></i>
                        Pilih
                      </button>
                    </td>
                  </tr>
                @endif
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection