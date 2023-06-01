<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h3 align="center">Sale Report</h3>
  <h4 align="center">LaraPos</h4>
  <h5 align="center">Jl.Keabadain - No.1</h5>
  <hr>
  <table width='100%' style="border-collapse: collapse;" border="1">
    <thead>
      <tr>
        <td>No</td>
        <td>Invoice</td>
        <td>date</td>
        <td>Customer</td>
        <td>Cashier</td>
        <td>Purchase</td>
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
      </tr>
      @endforeach
    </tbody>
  </table>
</body>
</html>