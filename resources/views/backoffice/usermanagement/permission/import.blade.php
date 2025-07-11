@section('title')
Import User Permission
@endsection

@extends('backoffice.backoffice')
@section('backofficepage')
<script src="{{ asset('backoffice/custom/js/jquery364.min.js') }}"></script>

<div class="page-content">
  <!--breadcrumb-->
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Import Permission </div>
    <div class="ps-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item active"><a href="{{ route('export') }}" class="btn btn-warning px-5">Export Xlsx </a></li>
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

              <form class="row g-3" action="{{ route('import') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="col-md-6">
                  <label for="input1" class="form-label">Xlsx File Import</label>
                  <input type="file" name="import_file" class="form-control">
                </div>

                <div class="col-md-12">
                  <div class="d-md-flex d-grid align-items-center gap-3">
                    <button type="submit" class="btn btn-primary px-4">Upload</button>

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