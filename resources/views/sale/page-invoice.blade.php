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
        <div id="invoice" class="table-responsive">
          <table width="100%" style="font-family: Arial, Helvetica, sans-serif;">
            <tr>
              <td align="center" colspan="4"><b>LaraPos</b></td>
            </tr>
            <tr>
              <td align="center" colspan="4">Jl.Keabadian No. 09</td>
            </tr>
            <tr>
              <td colspan="4"><hr></td>
            </tr>
            <tr>
              <td align="left" colspan="2">
                {{ date_format(date_create($sale->created_at),"d/m/Y h:m") }}
              </td>
              <td align="left">Cashier</td>
              <td align="right">
                {{ $sale->cashier_name }}
              </td>
            </tr>
            <tr>
              <td align="left" colspan="2">{{ $sale->invoice }}</td>
              <td align="left">Customer</td>
              <td align="right">
                @if ($sale->customer_id == null)
                  Umum
                @else
                  {{ $sale->customer_name }} 
                @endif
              </td>
            </tr>
            <tr>
              <td colspan="4"><hr></td>
            </tr>
            @foreach ($carts as $cart)
              <tr>
                <td>{{ $cart->product_name }}</td>
                <td align="right">{{ $cart->qty_product }}</td>
                <td align="right">{{ $cart->total_product / $cart->qty_product }}</td>
                <td align="right">{{ $cart->total_product }}</td>
              </tr>
            @endforeach
            <tr>
              <td colspan="4"><hr></td>
            </tr>
            <tr>
              <td align="right" colspan="3">Total</td>
              <td align="right">{{ $sale->total_price }}</td>
            </tr>
            <tr>
              <td align="right" colspan="3">Cash</td>
              <td align="right">{{ $sale->cash }}</td>
            </tr>
            <tr>
              <td align="right" colspan="3">Change</td>
              <td align="right">{{ $sale->remaining }}</td>
            </tr>
            <tr>
              <td colspan="4"><hr></td>
            </tr>
            <tr>
              <td align="center" colspan="4">Thank You</td>
            </tr>
            <tr>
              <td align="center" colspan="4">By : Lara Shop</td>
            </tr>
          </table>
        </div>
        <div class="row d-print-none mt-2">
          <div class="col-12 text-right">
            {{-- <button class="btn btn-primary" onclick="history.back()"><i class="fa fa-arrow-circle-o-left"></i> Back</button> --}}
            <button class="btn btn-primary" onclick="print()"><i class="fa fa-file-text"></i> Print</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  function print(){
    var print_div = document.getElementById("invoice");
    var print_area = window.open();
    print_area.document.write(print_div.innerHTML);
    print_area.document.close();
    print_area.focus();
    print_area.print();
    print_area.close();
  }
</script>

@endsection
