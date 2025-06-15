@section('title')
Add Social Media Profil Link
@endsection

@extends('backoffice.backoffice')
@section('backofficepage')
<script src="{{ asset('backoffice/custom/js/jquery364.min.js') }}"></script>
<div class="page-content">
  <!--breadcrumb-->
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Add Account Link</div>
    <div class="ps-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="{{ route('backoffice.dashboard') }}"><i class="bx bx-home-alt"></i></a></li>
          <li class="breadcrumb-item"><a href="{{ route('accountlinks.index') }}">All Account Links</a></li>
          <li class="breadcrumb-item active" aria-current="page">Add Account Link</li>
        </ol>
      </nav>
    </div>
  </div>
  <!--end breadcrumb-->

  <div class="card">
    <div class="card-body p-4">
      <h5 class="mb-4">Account Link</h5>
      <form id="myForm" action="{{ route('accountlinks.store') }}" method="post" class="row g-3" enctype="multipart/form-data">
        @csrf

        <div class="form-group col-md-6">
          <label for="input1" class="form-label">Network Name</label>
          <input type="text" name="name" class="form-control" id="input1">
        </div>

        <div class="col-md-6">
        </div>

        <div class="form-group col-md-6">
          <label for="input2" class="form-label">Network Logo as file</label>
          <input class="form-control" name="logo_image" type="file" id="image">
        </div>

        <div class="col-md-6">
          <img id="showImage" src="{{ url('upload/no_image.jpg')}}" alt="Admin" class="rounded-circle p-1 bg-primary" width="80">
        </div>
        
        <div class="form-group col-md-6">
          <label for="input3" class="form-label">Network Logo Alt Text</label>
          <input type="text" name="logo_alt_text" class="form-control" id="input3">
        </div>
        
        <div class="form-group col-md-6">
          <label for="input4" class="form-label">Network Logo as SVG Icon</label>
          <textarea type="text" name="logo_icon" class="form-control" id="input4"></textarea>
        </div>
        
        <div class="form-group col-md-6">
          <label for="input5" class="form-label">Logo Hover Text</label>
          <input type="text" name="hover_text" class="form-control" id="input5">
        </div>
        
        <div class="form-group col-md-6">
          <label for="input5" class="form-label">Link to Account</label>
          <input type="text" name="url" class="form-control" id="input6">
        </div>

        <div class="col-md-12">
          <div class="d-md-flex d-grid align-items-center gap-3">
            <button type="submit" class="btn btn-primary px-4">Save Changes</button>

          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('#image').change(function(e) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#showImage').attr('src', e.target.result);
      }
      reader.readAsDataURL(e.target.files['0']);
    });
  });
</script>
@endsection