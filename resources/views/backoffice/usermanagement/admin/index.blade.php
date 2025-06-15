@section('title')
All Admin User
@endsection

@extends('backoffice.backoffice')
@section('backofficepage')

<div class="page-content">
  <!--breadcrumb-->
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">All Backoffice User</div>
    <div class="ps-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="{{ route('backoffice.dashboard') }}"><i class="bx bx-home-alt"></i></a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">All Admin User</li>
        </ol>
      </nav>
    </div>
    @if (Auth::user()->can('user.management.add'))
    <div class="ms-auto">
      <div class="btn-group">
        <a href="{{ route('adminuser.create') }}" class="btn btn-primary  ">Add Admin User </a>
      </div>
    </div>
    @endif
  </div>
  <!--end breadcrumb-->

  <div class="card">
    <div class="card-body">
      <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
          <thead>
            <tr>
              <th>Sl </th>
              <th>Image </th>
              <th>Name </th>
              <th>Email </th>
              <th>Phone </th>
              <th>Role </th>
              <th>Action </th>
            </tr>
          </thead>
          <tbody>

            @foreach($alladmin as $key => $item)
            <tr>
              <td>{{ $key+1 }}</td>
              <td><img src="{{ (!empty($item->photo)) ? url('upload/profile_images/'.$item->photo) : url('upload/no_image.jpg') }}" style="width:70px; height:40px;"> </td>
              <td>{{ $item->name }}</td>
              <td>{{ $item->email }}</td>
              <td>{{ $item->phone }}</td>
              <td>
                @foreach($item->roles as $role)
                <span class="badge badge-pill bg-danger">{{ $role->name }}</span>
                @endforeach
              </td>
              <td>
                @if (Auth::user()->can('user.management.edit'))
                <a href="{{ route('adminuser.edit',$item->id) }}" class="btn btn-info px-5">Edit </a>
                @endif
                @if (Auth::user()->can('user.management.delete'))
                <a href="{{ route('adminuser.destroy',$item->id) }}" class="btn btn-danger px-5" id="delete">Delete </a>
                @endif
              </td>
            </tr>
            @endforeach

          </tbody>

        </table>
      </div>
    </div>
  </div>

</div>

@endsection