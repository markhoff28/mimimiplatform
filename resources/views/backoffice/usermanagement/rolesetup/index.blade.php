@section('title')
All Roles in Permission
@endsection

@extends('backoffice.backoffice')
@section('backofficepage')

<div class="page-content">
  <!--breadcrumb-->
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="ps-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="{{ route('backoffice.dashboard') }}"><i class="bx bx-home-alt"></i></a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">All Roles in Permission</li>
        </ol>
      </nav>
    </div>
    @if (Auth::user()->can('role.permission.add'))
    <div class="ms-auto">
      <div class="btn-group">
        <a href="{{ route('roles.permission.create') }}" class="btn btn-primary  ">Add Roles Permission </a>
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
              <th>Sl</th>
              <th>Roles Name </th>
              <th>Permission </th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>

            @foreach ($roles as $key=> $item)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $item->name }}</td>
              <td>
                @foreach ($item->permissions as $prem)
                <span class="badge bg-danger">{{ $prem->name }}</span>
                @endforeach

              </td>
              <td>
              @if (Auth::user()->can('role.permission.edit'))
                <a href="{{ route('roles.permission.edit',$item->id) }}" class="btn btn-info px-5">Edit </a>
                @endif
                @if (Auth::user()->can('role.permission.delete'))
                <a href="{{ route('roles.permission.destroy',$item->id) }}" class="btn btn-danger px-5" id="delete">Delete </a>
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