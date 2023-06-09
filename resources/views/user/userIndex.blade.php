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
        <a href="/user/create" class="btn btn-primary btn-sm mb-3"><i class="icon fa fa-plus"></i> Create {{ $title }}</a>
        <div class="table-responsive">
          <table class="table table table-sm table-hover table-bordered" id="sampleTable">
            <thead>
              <tr>
                <th>No</th>
                <th>Picture</th>
                <th>Username</th>
                <th>Name</th>
                <th>Address</th>
                <th>Level</th>
                <th>Option</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
                <tr>
                  <td class="align-middle" align="center">{{ $loop->iteration }}</td>
                  <td class="align-middle" align="center"><img src="
                    @if ($user->profile_picture == 'default_user.png')
                    {{ asset('images/default_user.png') }}
                    @else
                    {{ asset('images/'. $user->profile_picture) }}
                    @endif
                    " class="rounded" height="75px" alt="">
                  </td>
                  <td class="align-middle" align="center">{{ $user->username }}</td>
                  <td class="align-middle" align="center">{{ $user->name }}</td>
                  <td class="align-middle" align="center">{{ $user->address }}</td>
                  <td class="align-middle" align="center">{{ $user->level }}</td>
                  <td class="align-middle" align="center">
                    <a href="/user/{{ $user->id }}/edit" class="btn btn-info btn-xs"><i class="icon fa fa-edit"></i> Update</a>
                    <form class="d-inline" action="{{ route('user.destroy',$user->id) }}" 
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