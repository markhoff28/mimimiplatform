@section('title')
Add User Permission
@endsection

@extends('backoffice.backoffice')
@section('backofficepage')
<script src="{{ asset('backoffice/custom/js/jquery364.min.js') }}"></script>

<div class="page-content">
  <!--breadcrumb-->
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Add Permission </div>
    <div class="ps-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="{{ route('backoffice.dashboard') }}"><i class="bx bx-home-alt"></i></a>
          </li>
          <li class="breadcrumb-item"><a href="{{ route('permission.index') }}">All Permission</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">Add Permission</li>
        </ol>
      </nav>
    </div>

  </div>
  <!--end breadcrumb-->
  <div class="container">
    <div class="main-body">
      <div class="row">

        <div class="col-lg-12">

          <div class="card">
            <div class="card-body p-4">

              <form class="row g-3" action="{{ route('permission.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="col-md-6">
                  <label for="input1" class="form-label">Permission Name </label>
                  <input type="text" name="name" class="form-control">
                </div>

                <div class="col-md-6">
                  <label for="input1" class="form-label">Permission Group </label>
                  <select name="group_name" class="form-select mb-3" aria-label="Default select example">
                    <option selected="">Select Group </option>
                    <option value="Marketing and Socal Media">Marketing and Socal Media</option>
                    <option value="Socal Media Account Link">Socal Media Account Link</option>
                    <option value="Setting User">Setting User</option>
                    <option value="Mail Setting">Mail Setting</option>
                    <option value="Site Setting">Site Setting</option>
                    <option value="SEO Setting">SEO Setting</option>
                    <option value="Admin User ">Admin User </option>
                    <option value="Usermanagement ">Usermanagement User </option>
                    <option value="Role and Permission">Role and Permission </option>
                  </select>
                </div>

                <div class="col-md-12">
                  <div class="d-md-flex d-grid align-items-center gap-3">
                    <button type="submit" class="btn btn-primary px-4">Save Changes </button>
                  </div>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection