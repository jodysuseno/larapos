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
        <a href="{{ route('item.create') }}" class="btn btn-primary mb-3"><i class="icon fa fa-plus"></i> Add {{ $title }}</a>
        <div class="table-responsive">
          <table class="table table-sm table-hover table-bordered" id="sampleTable">
            <thead>
              <tr>
                <th>No</th>
                <th>Barcode</th>
                <th>Name</th>
                <th>Category</th>
                <th>Unit</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Option</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($items as $item)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td align="right">{{ $item->barcode }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->catname }}</td>
                <td>{{ $item->unitname }}</td>
                <td align="right">IDR. {{ $item->price }}</td>
                <td align="right">{{ $item->stock }}</td>
                <td>
                  <a href="{{ route('item.edit', $item->item_id) }}" class="btn btn-warning btn-xs"><i class="icon fa fa-edit"></i> Edit</a>
                  <form class="d-inline" action="{{ route('item.destroy',$item->item_id) }}" 
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