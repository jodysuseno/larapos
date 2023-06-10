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
      <h3 class="tile-title">Graph for Sales in {{ $year_now }}</h3>
      <div class="embed-responsive embed-responsive-16by9">
        <canvas class="embed-responsive-item" id="LineChartDemo"></canvas>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="tile">
      <h3 class="tile-title">Top sales in this month</h3>
      <div class="embed-responsive embed-responsive-16by9">
        <canvas class="embed-responsive-item" id="pieChartDemo"></canvas>
      </div>
    </div>
  </div>
</div>   
<script type="text/javascript" src="{{ asset('valiadmin/js/plugins/chart.js')}}"></script>
<script type="text/javascript">
  var sales_data = {
    labels: [
      "January", 
      "February", 
      "March", 
      "April", 
      "May",
      "Juny",
      "July",
      "August",
      "September",
      "November",
      "Dessember",
    ],
    datasets: [
      {
        label: "Sale",
        fillColor: "rgba(151,187,205,0.2)",
        strokeColor: "rgba(151,187,205,1)",
        pointColor: "rgba(151,187,205,1)",
        pointStrokeColor: "#fff",
        pointHighlightFill: "#fff",
        pointHighlightStroke: "rgba(151,187,205,1)",
        data: {{ json_encode($sale_data_graph) }}
      }
    ]
  };
  
  var ctxl = $("#LineChartDemo").get(0).getContext("2d");
  var lineChart = new Chart(ctxl).Line(sales_data);
  
  var top_sell_data = [
    {
      value: {{ $data_top_sale[0][1] }},
      color:"#2A6041",
      highlight: "#398158",
      label: "{{ $data_top_sale[0][0] }}"
    },
    {
      value: {{ $data_top_sale[1][1] }},
      color: "#28965A",
      highlight: "#30B66D",
      label: "{{ $data_top_sale[1][0] }}"
    },
    {
      value: {{ $data_top_sale[2][1] }},
      color: "#2CEAA3",
      highlight: "#49EDB1",
      label: "{{ $data_top_sale[2][0] }}"
    },
    {
      value: {{ $data_top_sale[3][1] }},
      color: "#6BFFB8",
      highlight: "#7EFFC1",
      label: "{{ $data_top_sale[3][0] }}"
    },
    {
      value: {{ $data_top_sale[4][1] }},
      color: "#7CFEF0",
      highlight: "#8DFEF3",
      label: "{{ $data_top_sale[4][0] }}"
    }
  ];

  var ctxp = $("#pieChartDemo").get(0).getContext("2d");
  var pieChart = new Chart(ctxp).Pie(top_sell_data);

</script>
@endsection