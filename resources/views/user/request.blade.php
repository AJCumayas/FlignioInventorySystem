@extends('layouts.dash')

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

                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif

                        <table class="table table-fluid" id="myTable">
                            <thead>
                                <tr>
                                    <th>Employee ID</th>
                                    <th>Email</th>
                                    <th>Name</th>
                                    <th>Company</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($requests as $users )
                                   <tr>
                                       <td>{{$users->employee_id}}</td>
                                       <td>{{$users->email}}</td>
                                       <td>{{$users->first_name}} {{$users->last_name}}</td>
                                       <td>{{$users->company_name}}</td>
                                       <td>

                                        <a href="{{ route('approve',['requests' => $users->id]) }}"
                                            class="btn btn-primary btn-sm">Approve</a>
                                            <a href="{{ route('disapprove',['requests' => $users->id]) }}"
                                                class="btn btn-primary btn-sm">Disapprove</a>

                                                {{-- <span class="text-danger">
                                                    @error('password'){{$message}}@enderror
                                                </span> --}}

                                        </td>
                                        </a>



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
