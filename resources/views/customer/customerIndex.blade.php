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
        @if (session('status'))
          <div class="bs-component">
              <div class="alert alert-dismissible alert-success">
                  <button class="close" type="button" data-dismiss="alert">×</button>{{ session('status') }}
              </div>
          </div>    
        @endif
        <a href="{{ route('customer.create') }}" class="btn btn-primary mb-3"><i class="icon fa fa-plus"></i> Add {{ $title }}</a>
        <div class="table-responsive">
          <table class="table table-sm table-hover table-bordered" id="sampleTable1">
            <thead>
              <tr>
                <th>No</th>
                <th>Name</th>
                <th>gender</th>
                <th>phone</th>
                <th>address</th>
                <th>Option</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($customers as $customer)
                @if ($loop->first) @continue @endif
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->gender }}</td>
                <td>{{ $customer->phone }}</td>
                <td>{{ $customer->address }}</td>
                <td>
                  <a href="{{ route('customer.edit', $customer->customer_id) }}" class="btn btn-warning btn-xs"><i class="icon fa fa-edit"></i> Edit</a>
                  <form class="d-inline" action="{{ route('customer.destroy',$customer->customer_id) }}" 
                    method="POST" onsubmit="return confirm('Are you sure to delete the data?')">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger btn-xs"><i class="icon fa fa-trash"></i> Delete</button>
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