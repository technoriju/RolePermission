@extends('admin.layout.common')
@push('link')
    <link rel="stylesheet" href="{{ url('/') }}/admin/vendors/select2/select2.min.css">
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
                                <h4 class="card-title">Add User</h4>
                                <a href="{{route('user.index')}}" class="btn btn-success btn-icon-text">
                                    <i class="typcn typcn-document btn-icon-append"></i>
                                    All User
                                </a>
                            </div>
                            <form class="forms-sample" action="{{route('user.store')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Name</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputUsername1" placeholder="Name" value="{{old('name')}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Phone</label>
                                    <input type="text" name="phone" class="form-control" id="exampleInputUsername1" placeholder="Phone" value="{{old('phone')}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Email</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputUsername1" placeholder="Email" value="{{old('email')}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Password</label>
                                    <input type="password" name="password" class="form-control" id="exampleInputUsername1" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control" id="exampleInputUsername1" placeholder="Confirm Password">
                                </div>
                                <div class="form-group">
                                    <label>Select a Role</label>
                                    <select name="role[]" class="js-example-basic-multiple w-100" multiple="multiple">
                                    {{-- <option selected value="">Choose any one</option> --}}
                                    @if(isset($role) && count($role)>0)
                                        @foreach($role as $val)
                                        <option value="{{$val->name}}">{{$val->name}}</option>
                                        @endforeach
                                    @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <div class="row">
                                      <div class="form-check">
                                        <label class="form-check-label">
                                          <input type="radio" class="form-check-input" name="status" id="membershipRadios1" value="{{ old('status',1)}}" checked>
                                          Active
                                        </label>
                                      </div>
                                      <div class="form-check">
                                        <label class="form-check-label">
                                          <input type="radio" class="form-check-input" name="status" id="membershipRadios2" value="{{ old('status',0)}}">
                                           Inactive
                                        </label>
                                      </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
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
