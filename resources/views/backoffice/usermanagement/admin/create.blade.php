@section('title')
Add Backoffice User
@endsection

@extends('backoffice.backoffice')
@section('backofficepage')
<script src="{{ asset('backoffice/custom/js/jquery364.min.js') }}"></script>
<div class="page-content">

  <!--breadcrumb-->
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Add Backoffice User</div>
    <div class="ps-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="{{ route('backoffice.dashboard') }}"><i class="bx bx-home-alt"></i></a></li>
          <li class="breadcrumb-item"><a href="{{ route('adminuser.index') }}">All Admin User</a></li>
          <li class="breadcrumb-item active" aria-current="page">Add Admin User</li>
        </ol>
      </nav>
    </div>

  </div>
  <!--end breadcrumb-->

  <div class="card">
    <div class="card-body p-4">
      <h5 class="mb-4">Add Admin </h5>
      <form id="myForm" method="POST" action="{{ route('adminuser.store') }}" class="forms-sample">
        @csrf

        <div class="form-group col-md-6 mb-3">
          <label for="exampleInputEmail1" class="form-label">Admin User Name </label>
          <input type="text" name="username" class="form-control">
        </div>
        <div class="form-group col-md-6 mb-3">
          <label for="exampleInputEmail1" class="form-label">Admin Name </label>
          <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group col-md-6 mb-3">
          <label for="exampleInputEmail1" class="form-label">Admin Email </label>
          <input type="email" name="email" class="form-control">
        </div>
        <div class="form-group col-md-6 mb-3">
          <label for="exampleInputEmail1" class="form-label">Admin Phone </label>
          <input type="text" name="phone" class="form-control">
        </div>
        <div class="form-group col-md-6 mb-3">
          <label for="exampleInputEmail1" class="form-label">Admin Address </label>
          <input type="text" name="address" class="form-control">
        </div>
        <div class="form-group col-md-6 mb-3">
          <label for="exampleInputEmail1" class="form-label">Admin Password </label>
          <input type="password" name="password" class="form-control">
        </div>
        <div class="form-group col-md-6 mb-3">
          <label for="exampleInputEmail1" class="form-label">Role Name </label>
          <select name="roles" class="form-select" id="exampleFormControlSelect1">
            <option selected="" disabled="">Select Role</option>
            @foreach($roles as $role)
            <option value="{{ $role->id }}">{{ $role->name }}</option>
            @endforeach
          </select>
        </div>


        <button type="submit" class="btn btn-primary me-2">Save Changes </button>

      </form>

    </div>

  </div>


  @endsection