<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h3 align="center" style="margin-bottom:5px; margin-top:5px;">Stock report in {{ $date->format('F Y') }}</h3>
  <h4 align="center" style="margin-bottom:5px; margin-top:5px;">{{ $name_shop }}</h4>
  {{-- <h5 align="center" style="margin-bottom:5px; margin-top:5px;">Jl.Keabadain - No.1</h5> --}}
  <h6 align="center" style="margin-bottom:5px; margin-top:5px;">Phone : {{ $phone }}</h6>
  <p align="right" style="margin-bottom:1px; margin-top:1px;">Date : {{ $date->format('d F Y') }}</p>
  <hr>
  <table width='100%' style="border-collapse: collapse;" border="1">
    <thead>
      <tr>
        <th>No</th>
        <th>Barcode</th>
        <th>Date</th>
        <th>Supplier</th>
        <th>Product</th>
        <th>Status</th>
        <th>Quantity</th>
        <th>Description</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($sales as $sale)
        <tr>
          <td align="center">{{ $loop->iteration }}</td>
          <td align="right">{{ $sale->item_barcode }}</td>
          <td align="right">{{ date_format(date_create($sale->date),"d/m/Y") }}</td>
          <td align="left">{{ $sale->supplier_name }}</td>
          <td align="left">{{ $sale->product_item }}</td>
          <td align="center">{{ $sale->type }}</td>
          <td align="right">{{ $sale->qty }}</td>
          <td align="left">{{ $sale->detail }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
  <br><br>
  <table width="100%">
    <tr>
      <td width="33%">
      </td>
      <td width="33%">
      </td>
      <td width="33%">
        <div class="text-right">
          {{ $date->format('l') }}, {{ $date->format('d F Y') }}
        </div>
        <br><br><br><br><br><br><hr>
      </td>
    </tr>
  </table>
</body>
</html>