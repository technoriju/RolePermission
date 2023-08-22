@extends('admin.layout.common')
@section('main')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="custom-table-header">
                                <h4 class="card-title">All Roles</h4>
                                <a href="{{route('role.create')}}" class="btn btn-success btn-icon-text">
                                    <i class="typcn typcn-document btn-icon-append"></i>
                                    Add Role
                                </a>
                            </div>
                            @if(session('success') != null)
                             <div class="alert alert-success">{{session('success')}}</div>
                            @endif
                            <div class="table-responsive pt-3">
                                <table class="table table-striped project-orders-table">
                                    <thead>
                                        <tr>
                                            <th class="ml-5">#</th>
                                            <th>Role</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(isset($role) && count($role)>0)
                                        @foreach($role as $val)
                                        <tr>
                                            <td>{{$loop->index + 1}}</td>
                                            <td>{{$val->name}} </td>
                                            <td>
                                                @if($val->status == 1)
                                                  <label class="badge badge-success">Active</label>
                                                @else
                                                  <label class="badge badge-danger">Inactive</label>
                                                @endif
                                            </td>
                                            <td>{{df($val->created_at)}}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <a href="{{route('role.edit',$val->id)}}" class="btn btn-success btn-sm btn-icon-text mr-3">
                                                        Edit
                                                        <i class="typcn typcn-edit btn-icon-append"></i>
                                                    </a>
                                                    <form action="{{route('role.destroy',$val->id)}}" method="post">
                                                       @csrf
                                                       @method('DELETE')
                                                       <button class="btn btn-danger btn-sm btn-icon-text">Delete
                                                        <i class="typcn typcn-delete-outline btn-icon-append"></i>
                                                       </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                       @endforeach
                                       @else
                                         No data found
                                       @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.layout.footer')
    </div>
@endsection
@push('custom-js')
@endpush
