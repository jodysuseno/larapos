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
@endsection