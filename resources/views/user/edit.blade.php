@extends('layouts.dash')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit User</h6>
                </div>
                <form method="POST" action="{{route('update', ['user' => $user->id])}}">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        <div class="form-group row">

                            {{-- Employee ID--}}
                            <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                                {{-- <span style="color:red;">*</span> --}}
                                <label>Employee ID</label>
                                <input
                                    type="text"
                                    id="exampleEmployeeId"
                                    placeholder="{{$user->employee_id}}"
                                    name="employee_id"
                                    disabled>
                            </div>

                            {{-- Email --}}
                            <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                                {{-- <span style="color:red;">*</span> --}}
                                <label>Email Address</label>
                                <input
                                    type="text"
                                    id="exampleEmail"
                                    placeholder="{{$user->email}}"
                                    name="email"
                                    disabled>
                            </div>

                            {{-- Role --}}
                            <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                                <span style="color:red;">*</span>Role</label>
                                <input
                                    type="text"
                                    class="form-control form-control-user @error('role_assign') is-invalid @enderror"
                                    id="exampleEmail"
                                    placeholder="Role"
                                    name="role_assign"
                                    value="{{ old('role_request') ? old('role_request') : $user->role_request }}">

                                @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            {{-- <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                                <span style="color:red;">*</span>Role</label>
                                <select class="form-control form-control-user @error('role_id') is-invalid @enderror" name="role_id">
                                    <option selected disabled>Select Role</option>
                                    @foreach ($roles as $role)
                                        <option value="{{$role->id}}"
                                            {{old('role_id') ? ((old('role_id') == $role->id) ? 'selected' : '') : (($user->role_id == $role->id) ? 'selected' : '')}}>
                                            {{$role->name}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('role_id')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div> --}}

                            <div class="card-footer">
                                <button type="submit" class="btn btn-success btn-user float-right mb-3">Update</button>
                                <a class="btn btn-primary float-right mr-3 mb-3" href="{{ route('users.index') }}">Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
