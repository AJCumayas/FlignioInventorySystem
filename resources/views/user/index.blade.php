@extends('layouts.dash')
@include('common.alert')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">All Users</h6>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-fluid" id="myTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Employee ID</th>
                                    <th>Email</th>
                                    <th>Role Request</th>
                                    <th>Role</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($users as $users )
                                   <tr>
                                       <td>{{$users->id}}</td>
                                       <td>{{$users->employee_id}}</td>
                                       <td>{{$users->email}}</td>
                                       <td>{{$users->role_request}}</td>
                                       <td>{{$users->role->slug}}</td>
                                       <td>
                                        <a href="{{ route('edit', ['user' => $users->id]) }}"
                                            class="btn btn-primary m-2">
                                            <i class="fa fa-pen">Assign a Role</i>
                                        </a></td>
                                   </tr>
                               @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
    </script>
@endsection
