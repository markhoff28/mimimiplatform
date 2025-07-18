@section('title')
Add Role In Permission
@endsection

@extends('backoffice.backoffice')
@section('backofficepage')
<script src="{{ asset('backoffice/custom/js/jquery364.min.js') }}"></script>

<style>
  .form-check-label {
    text-transform: capitalize;
  }
</style>

<div class="page-content">
  <!--breadcrumb-->
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="ps-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="{{ route('backoffice.dashboard') }}"><i class="bx bx-home-alt"></i></a></li>
          <li class="breadcrumb-item"><a href="{{ route('roles.permission.index') }}">All Roles in Permission</a></li>
          <li class="breadcrumb-item active" aria-current="page">Add Role In Permission</li>
        </ol>
      </nav>
    </div>

  </div>
  <!--end breadcrumb-->

  <div class="card">
    <div class="card-body p-4">

      <form id="myForm" action="{{ route('roles.permission.store') }}" method="post" class="row g-3" enctype="multipart/form-data">
        @csrf

        <div class="form-group col-md-6">
          <label for="input1" class="form-label"> Roles Name</label>
          <select name="role_id" class="form-select mb-3" aria-label="Default select example">
            <option selected="" disabled>Open Roles</option>
            @foreach ($roles as $role)
            <option value="{{ $role->id }}">{{ $role->name }}</option>
            @endforeach

          </select>
        </div>


        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="flexCheckMain">
          <label class="form-check-label" for="flexCheckMain">Permission All </label>
        </div>

        <hr>

        @foreach ($permission_groups as $group)
        <div class="row">
          <div class="col-3">

            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="{{ $group->group_name }}">
              <label class="form-check-label" for="{{ $group->group_name }}">{{ $group->group_name }}</label>
            </div>

          </div>

          <div class="col-9">
            @php
            $permissions = App\Models\User::getPermissionByGroupName($group->group_name)
            @endphp

            @foreach ($permissions as $permission)
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="permission[]" value="{{ $permission->id }}" id="checkDefault{{ $permission->id }}">
              <label class="form-check-label" for="checkDefault{{ $permission->id }}">{{ $permission->name }}</label>
            </div>
            @endforeach
            <br>

          </div>

        </div>
        @endforeach



        <div class="col-md-12">
          <div class="d-md-flex d-grid align-items-center gap-3">
            <button type="submit" class="btn btn-primary px-4">Save Changes</button>

          </div>
        </div>
      </form>
    </div>
  </div>




</div>

<script>
  $('#flexCheckMain').click(function() {
    if ($(this).is(':checked')) {
      $('input[ type=checkbox]').prop('checked', true)
    } else {
      $('input[ type=checkbox]').prop('checked', false)
    }
  });
</script>

@endsection