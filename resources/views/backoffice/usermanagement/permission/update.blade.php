@section('title')
Edit User Permission
@endsection

@extends('backoffice.backoffice')
@section('backofficepage')
<script src="{{ asset('backoffice/custom/js/jquery364.min.js') }}"></script>

<div class="page-content">
  <!--breadcrumb-->
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Edit Permission </div>
    <div class="ps-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="{{ route('backoffice.dashboard') }}"><i class="bx bx-home-alt"></i></a>
          </li>
          <li class="breadcrumb-item"><a href="{{ route('permission.index') }}">All Permission</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">Edit Permission</li>
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

              <form class="row g-3" action="{{ route('permission.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $permission->id }}">

                <div class="col-md-6">
                  <label for="input1" class="form-label">Permission Name </label>
                  <input type="text" name="name" class="form-control" value="{{ $permission->name }}">
                </div>

                <div class="col-md-6">
                  <label for="input2" class="form-label">Permission Group </label>
                  <select name="group_name" class="form-select mb-3" aria-label="Default select example">
                    <option selected="">Select Group </option>
                    <option value="Marketing and Socal Media" {{ $permission->group_name == 'Marketing and Socal Media' ? 'selected' : '' }}>Marketing and Socal Media</option>
                    <option value="Socal Media Account Link" {{ $permission->group_name == 'Socal Media Account Link' ? 'selected' : '' }}>Socal Media Account Link</option>
                    <option value="Setting User" {{ $permission->group_name == 'Setting User' ? 'selected' : '' }}>Setting User</option>
                    <option value="Mail Setting" {{ $permission->group_name == 'Mail Setting' ? 'selected' : '' }}>Mail Setting</option>
                    <option value="Site Setting" {{ $permission->group_name == 'Site Setting' ? 'selected' : '' }}>Site Setting</option>
                    <option value="SEO Setting" {{ $permission->group_name == 'SEO Setting' ? 'selected' : '' }}>SEO Setting</option>
                    <option value="Admin User" {{ $permission->group_name == 'Admin User' ? 'selected' : '' }}>Admin User </option>
                    <option value="Usermanagement" {{ $permission->group_name == 'Usermanagement' ? 'selected' : '' }}>Usermanagement </option>
                    <option value="Role and Permission" {{ $permission->group_name == 'Role and Permission' ? 'selected' : '' }}>Role and Permission </option>
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