@extends('temp.main')

@section('container')
<div class="app-title">
  <div>
    <h1><i class="{{ $icon }}"></i> {{ $title }}</h1>
  </div>
</div>
<div class="row">
  <div class="col-md-6 col-lg-3">
    <div class="widget-small info coloured-icon"><i class="icon fa fa-th fa-3x"></i>
      <div class="info">
        <h4>Item</h4>
        <p><b>{{ $count_item }}</b></p>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-lg-3">
    <div class="widget-small danger coloured-icon"><i class="icon fa fa-truck fa-3x"></i>
      <div class="info">
        <h4>Supplier</h4>
        <p><b>{{ $count_supplier }}</b></p>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-lg-3">
    <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
      <div class="info">
        <h4>Customer</h4>
        <p><b>{{ $count_customer}}</b></p>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-lg-3">
    <div class="widget-small warning coloured-icon"><i class="icon fa fa-user-plus fa-3x"></i>
      <div class="info">
        <h4>Users</h4>
        <p><b>{{ $count_user }}</b></p>
      </div>
    </div>
  </div>
</div>  
<div class="row">
  <div class="col-md-8">
    <div class="tile">
      <h3 class="tile-title">Grafik Transaksi masuk dan keluar Tahun ini</h3>
      <div class="embed-responsive embed-responsive-16by9">
        <canvas class="embed-responsive-item" id="barChartDemo"></canvas>
      </div>
    </div>
  </div>
</div>   
<script type="text/javascript" src="{{ asset('valiadmin/js/plugins/chart.js')}}"></script>
<script type="text/javascript">
  var data = {
    labels: [
      "January", 
      "February", 
      "March", 
      "April", 
      "May"
    ],
    datasets: [
      {
        label: "Sale",
        fillColor: "green",
        data: [65, 59, 80, 81, 56]
      },
      {
        label: "Stock Masuk",
        fillColor: "blue",
        data: [65, 59, 80, 81, 56]
      },
      {
        label: "Stok Keluar",
        fillColor: "orange",
        data: [28, 48, 40, 19, 86]
      }
    ]
  };
  var ctxb = $("#barChartDemo").get(0).getContext("2d");
  var barChart = new Chart(ctxb).Bar(data);

</script>
@endsection