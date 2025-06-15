@section('title')
Social Media Profil Links
@endsection

@extends('backoffice.backoffice')
@section('backofficepage')

<div class="page-content">
  <!--breadcrumb-->
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">All Account Links</div>
    <div class="ps-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="{{ route('backoffice.dashboard') }}"><i class="bx bx-home-alt"></i></a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">All Account Links</li>
        </ol>
      </nav>
    </div>
    @if (Auth::user()->can('account.link.add'))
    <div class="ms-auto">
      <div class="btn-group">
        <a href="{{ route('accountlinks.create') }}" class="btn btn-primary px-5">Add Account Link </a>
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
              <th>Network Name</th>
              <th>Logo Image</th>
              <th>Logo Alt Text</th>
              <th>Logo Icon</th>
              <th>Hover Text</th>
              <th>Link to Account</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($accountLinks as $key=> $item)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $item->name }}</td>
              <td> <img src="{{ asset($item->logo_image) }}" alt="" style="width: 70px; height:40px;"> </td>
              <td>{{ $item->logo_alt_text }}</td>
              <td>{!! $item->logo_icon !!}</td>
              <td>{{ $item->hover_text }}</td>
              <td>{{ $item->url }}</td>
              <td>
                @if (Auth::user()->can('account.link.edit'))
                <a href="{{ route('accountlinks.edit',$item->id) }}" class="btn btn-info px-5">Edit</a>
                @endif
                @if (Auth::user()->can('account.link.delete'))
                <a href="{{ route('accountlinks.destroy',$item->id) }}" class="btn btn-danger px-5" id="delete">Delete </a>
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