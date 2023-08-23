@extends('admin.layout.common')
@section('main')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="custom-table-header">
                                <h4 class="card-title">All User</h4>
                                @can('create user')
                                    <a href="{{route('user.create')}}" class="btn btn-success btn-icon-text">
                                        <i class="typcn typcn-document btn-icon-append"></i>
                                        Add User
                                    </a>
                                @endcan
                            </div>
                            <div class="table-responsive pt-3">
                                <table class="table table-striped project-orders-table">
                                    <thead>
                                        <tr>
                                            <th class="ml-5">#</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(isset($user) && count($user)>0)
                                        @foreach($user as $val)
                                        <tr>
                                            <td>{{$loop->index + 1}}</td>
                                            <td>{{$val->name}} </td>
                                            <td>{{$val->phone}} </td>
                                            <td>{{$val->email}} </td>
                                            <td>
                                                @if(isset($val->roles) && count($val->roles)>0)
                                                    @foreach($val->roles as $role)
                                                    <label class="badge badge-info">{{$role->name}}</label>
                                                    @endforeach
                                                @else
                                                    <label class="badge badge-danger">No Role</label>
                                                @endif
                                            </td>
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
                                                    @can('edit user')
                                                        <a href="{{route('user.edit',$val->id)}}" class="btn btn-success btn-sm btn-icon-text mr-3">
                                                            Edit
                                                            <i class="typcn typcn-edit btn-icon-append"></i>
                                                        </a>
                                                    @endcan
                                                    @can('delete user')
                                                        <form action="{{route('user.destroy',$val->id)}}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger btn-sm btn-icon-text" onclick="return confirm('Are you sure?')">Delete
                                                            <i class="typcn typcn-delete-outline btn-icon-append"></i>
                                                            </button>
                                                        </form>
                                                    @endcan
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
