@extends('admin.layout.common')
@push('link')
    <link rel="stylesheet" href="{{ url('/') }}/admin/vendors/select2/select2.min.css">
    {{-- <link rel="stylesheet" href="{{ url('/') }}/admin/vendors/select2-bootstrap-theme/select2-bootstrap.min.css"> --}}
@endpush
@push('custom-css')
  <style>
       .form-check {
             margin-right: 12px;
       }
  </style>
@endpush
@section('main')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-2 grid-margin stretch-card"></div>
                <div class="col-md-8 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="custom-table-header">
                                <h4 class="card-title">Edit Roles</h4>
                                <a href="{{route('role.index')}}" class="btn btn-success btn-icon-text">
                                    <i class="typcn typcn-document btn-icon-append"></i>
                                    All Role
                                </a>
                            </div>
                            <p class="card-description">
                                Mark appropriate Permission
                            </p>
                            @if($errors->any())
                                <div class="alert alert-danger">{{$errors->first()}}</div>
                            @endif
                            @if(session('success') != null)
                                <div class="alert alert-success">{{session('success')}}</div>
                            @endif
                            <form class="forms-sample" action="{{route('role.update',$role->id)}}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Role Name</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputUsername1" value="{{old('name',$role->name)}}"
                                        placeholder="Add Role">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Choose Permission</label>
                                    <div class="row">
                                        @if(isset($permission) && count($permission)>0)
                                        @foreach ($permission as $val)
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input name="permission[]" type="checkbox" class="form-check-input" value="{{$val->id}}" @if(in_array($val->id,$permission_ids)) checked @endif>
                                                {{uc($val->name)}}
                                            </label>
                                        </div>
                                        @endforeach
                                        @else
                                          No permission data available
                                        @endif
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.layout.footer')
    </div>
@endsection
@push('custom-js')
    <script src="{{ url('/') }}/admin/vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <script src="{{ url('/') }}/admin/vendors/select2/select2.min.js"></script>

    <script src="{{ url('/') }}/admin/js/file-upload.js"></script>
    <script src="{{ url('/') }}/admin/js/typeahead.js"></script>
    <script src="{{ url('/') }}/admin/js/select2.js"></script>
@endpush
